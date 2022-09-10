<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Setting;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\CouponUser;
use App\Models\Cart;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function waiting_order_count(Request $request){
        $count = Order::where('user_id',Auth::guard('user_api')->user()->id)
            ->where('status','waiting')->count();
        $data = [];
        $setting = Setting::first();
        $delivery_date = date('Y-m-d' ,strtotime('+'.$setting->delivery_days.'day') ) ;
        $data = ['count'=>$count,'delivery_date'=>$delivery_date];
        return apiResponse($data);
    }
    /*================================================*/
    public function store_order(Request $request){
    //####################  start validation ###########################
        $validator = Validator::make($request->all(),[
            'price'                 =>'required',
            'total'                 =>'required',
            "details"               => "required|array|min:1",
            "details.*.type"        => "required",
            "details.*.unit_id"     => "required",
            "details.*.product_id"  => "required",
            "details.*.amount"      => "required",
        ]);
        if ($validator->fails()){
            return apiResponse(null,$validator->errors(),'422');
        }

        //####################  end validation ###########################
        $validator_array = [];

        $order = Order::where(['user_id'=>Auth::guard('user_api')->user()->id , 'status'=>'waiting'])
            ->with('order_details.product','order_details.offer','order_details.unit','user.governorate','user.city')
            ->first();

            //####################  amount validation ###########################
            foreach ($request->details as $key=>$detail) {
                if ($detail['type'] == 'product') {
                    $product = Product::where('id', $detail['product_id'])->first();
                    //*************** stock validation ###########################
                    if ($product->amount < $product->max_sm_amount){
                        $product->max_sm_amount = $product->amount;
                    }
                    $lg_amount = $product->amount / $product->lg_sm_amount;
                    if ( $lg_amount < $product->max_lg_amount) {
                        $product->max_lg_amount = $lg_amount;
                    }

                    //*************** end stock validation ###########################

                    $previous_detail = '';
                    if ($order)
                        $previous_detail = OrderDetails::where(['order_id'=>$order->id,'product_id'=>$detail['product_id'],'unit_id' =>$detail['unit_id'],'type' =>$detail['type'] ])->first();

                    if ($previous_detail){
                        $amount = $detail['amount'] + $previous_detail->amount ;
                    }else{
                        $amount = $detail['amount'] ;
                    }

                    if ($detail['unit_id'] == $product['sm_unit_id']) {
                        if ($amount  < $product->min_sm_amount)
                            array_push($validator_array,'المنتج '.$product->name . ' يجب ان يكون ' . $product->min_sm_amount .' على الاقل ' );
                        if ( $amount > $product->max_sm_amount)
                            array_push($validator_array,'المنتج '.$product->name . ' يجب ان يكون ' . $product->max_sm_amount .' على الاكثر ' );
                    }
                    if ($detail['unit_id'] == $product->lg_unit_id) {
                        if ( $amount < $product->min_lg_amount)
                            array_push($validator_array,'المنتج '.$product->name . ' يجب ان يكون ' . $product->min_lg_amount .' على الاقل ' );
                        if ( $amount > $product->max_lg_amount)
                            array_push($validator_array,'المنتج '.$product->name . ' يجب ان يكون ' . $product->max_lg_amount .' على الاكثر ' );
                    }
                }
            }

            if ($validator_array != []){
                return apiResponse(null,$validator_array,'422');
            }
            //####################  end amount validation ###########################
        $data = [];
        if ($order){
            $data['price'] = $order->price + $request->price;
            $data['total'] = $order->total + $request->total;
            $data['coupon_id'] = $request->coupon_id;
            $data['discount'] = $order->discount + $request->discount;
            CouponUser::where(['coupon_id'=>$request->coupon_id,'user_id'=>Auth::guard('user_api')->user()->id])->update(['is_paid'=>'yes']);

            $order->update($data);
        }else{
            $data = $request->only('coupon_id','price','total','discount');
            $setting = Setting::first();
            $data['delivery_date'] = date('Y-m-d ' ,strtotime('+'.$setting->delivery_days.'day') ) ;
            $data['user_id'] = Auth::guard('user_api')->user()->id ;
            CouponUser::where(['coupon_id'=>$request->coupon_id,'user_id'=>Auth::guard('user_api')->user()->id])->update(['is_paid'=>'yes']);

            $order = Order::create($data);
        }

        foreach ($request->details as $detail){
            $new_detail = OrderDetails::where(['order_id'=>$order->id,'product_id'=>$detail['product_id'],'unit_id' =>$detail['unit_id'],'type' =>$detail['type'] ])->first();
            if ($new_detail){
                $new_detail->update(['amount'=> $new_detail->amount + $detail['amount'] ]);
            }else{
                $new_detail = new OrderDetails;
                $new_detail->order_id       = $order->id;
                $new_detail->product_id     = $detail['product_id'];
                $new_detail->amount         = $detail['amount'];
                $new_detail->type           = $detail['type'];
                $new_detail->unit_id        = $detail['unit_id'];
                $new_detail->save();
            }

            if ($detail['type'] == 'product') {
                $new_amount = 0;
                if ($detail['unit_id'] == $new_detail->product->sm_unit_id) {
                    $new_amount = $new_detail->product->amount - $detail['amount'];
                }
                if($detail['unit_id'] == $new_detail->product->lg_unit_id ) {
                    $unit_amount = $new_detail->product->lg_sm_amount * $detail['amount'] ;
                    $new_amount = $new_detail->product->amount - $unit_amount;
                }
                $new_detail->product->update(['amount' => $new_amount]);
            } else {
                $new_detail->offer->update(['amount' => $new_detail->offer->amount - $detail['amount']]);
            }
        }
        Cart::where('user_id',Auth::guard('user_api')->user()->id)->delete();
        $order = Order::where('id',$order->id)->with('order_details.product','order_details.offer','order_details.unit','user.governorate','user.city')->first();

        return apiResponse($order);
    }
    /*================================================*/
    public function current_orders(Request $request){
        $order = Order::where('user_id',Auth::guard('user_api')->user()->id)
            ->whereIn('status',['waiting','new','on_going','delivery'])
            ->with('order_details.product','order_details.offer','order_details.unit','user.governorate','user.city')
            ->latest()->get();
        return apiResponse($order);
    }
    /*================================================*/
    public function previous_orders(Request $request){
        $order = Order::where('user_id',Auth::guard('user_api')->user()->id)
            ->whereIn('status',['ended','canceled'])
            ->with('order_details.product','order_details.offer','order_details.unit','user.governorate','user.city')
            ->latest()->get();
        return apiResponse($order);
    }
    /*================================================*/
    public function order_details(Request $request){
        $order = Order::where('id',$request->id)
            ->with('order_details.product','order_details.offer','order_details.unit','user.governorate','user.city')
            ->first();

//        $order->setRelation('order_details',
//          collect([])->merge( $order->order_details()->paginate(2) ) );
//        return
//        $array = [];
//        foreach ($order->order_details as $key=>$detail){
//            if ($key == '0' ){
//                $array = $detail;
//            }
//        }
//        $order['order_details'] = $array;
        return apiResponse($order);
    }
    /*================================================*/
//    public function order_details_products(Request $request){
//        $order = Order::where('id',$request->id)
//            ->with('order_details.product','order_details.offer','order_details.unit','user.governorate','user.city')
//            ->first();
//        return apiResponse($order);
//    }
    /*================================================*/
    public function update_order(Request $request){
        //####################  start validation ###########################
        $validator = Validator::make($request->all(),[
            'id'                    =>'required|exists:orders,id',
            'price'                 =>'required',
            'total'                 =>'required',
            "details"               => "required|array|min:1",
            "details.*.type"        => "required",
            "details.*.unit_id"     => "required",
            "details.*.product_id"  => "required",
            "details.*.amount"      => "required",
        ]);
        if ($validator->fails()){
            return apiResponse(null,$validator->errors(),'422');
        }


        $validator_array = [];
        foreach ($request->details as $key=>$detail) {
            if ($detail['type'] == 'product') {
                $product = Product::where('id', $detail['product_id'])->first();
                $amount = $detail['amount'] ;
                //*************** stock validation ###########################
                if ($product->amount < $product->max_sm_amount){
                    $product->max_sm_amount = $product->amount;
                }
                $lg_amount = $product->amount / $product->lg_sm_amount;
                if ( $lg_amount < $product->max_lg_amount) {
                    $product->max_lg_amount = $lg_amount;
                }
                //*************** end stock validation ###########################

                if ($detail['unit_id'] == $product['sm_unit_id']) {
                    if ($amount  < $product->min_sm_amount)
                        array_push($validator_array,'المنتج '.$product->name . ' يجب ان يكون ' . $product->min_sm_amount .' على الاقل ' );
                    if ( $amount > $product->max_sm_amount)
                        array_push($validator_array,'المنتج '.$product->name . ' يجب ان يكون ' . $product->max_sm_amount .' على الاكثر ' );
                }
                if ($detail['unit_id'] == $product->lg_unit_id) {
                    if ( $amount < $product->min_lg_amount)
                        array_push($validator_array,'المنتج '.$product->name . ' يجب ان يكون ' . $product->min_lg_amount .' على الاقل ' );
                    if ( $amount > $product->max_lg_amount)
                        array_push($validator_array,'المنتج '.$product->name . ' يجب ان يكون ' . $product->max_lg_amount .' على الاكثر ' );
                }

            }
        }

        if ($validator_array != []){
            return apiResponse(null,$validator_array,'422');
        }

        //####################  end validation ###########################

        $data = $request->only('coupon_id','price','total','discount');
        CouponUser::where(['coupon_id'=>$request->coupon_id,'user_id'=>Auth::guard('user_api')->user()->id])->update(['is_paid'=>'yes']);
        Order::where('id',$request->id)->update($data);

        OrderDetails::where('order_id',$request->id)->delete();
        foreach ($request->details as $detail){
            $new_detail = new OrderDetails;
            $new_detail->order_id       = $request->id;
            $new_detail->product_id     = $detail['product_id'];
            $new_detail->amount         = $detail['amount'];
            $new_detail->type           = $detail['type'];
            $new_detail->unit_id        = $detail['unit_id'];
            $new_detail->save();
        }

        $order = Order::where('id',$request->id)->with('order_details.product','order_details.offer','order_details.unit','user.governorate','user.city')->first();
        return apiResponse($order);
    }
    /*================================================*/
    public function cancel_order(Request $request){
        $validator = Validator::make($request->all(),[
            'id'                    =>'required|exists:orders,id',
        ]);
        if ($validator->fails()){
            return apiResponse(null,$validator->errors(),'422');
        }
        $data = $request->only('id');
        $data['status'] = 'canceled';
        $order =  Order::where('id',$request->id)
            ->with('order_details.product','order_details.offer','order_details.unit','user.governorate','user.city')
            ->first();
        $order->update($data);

        foreach ($order->order_details as $detail){
            $detail = OrderDetails::where(['order_id'=>$order->id,'product_id'=>$detail['product_id'],'unit_id' =>$detail['unit_id'],'type' =>$detail['type'] ])->first();

            if ($detail['type'] == 'product') {
                $new_amount = 0;
                if ($detail['unit_id'] == $detail->product->sm_unit_id) {
                    $new_amount = $detail->product->amount + $detail['amount'];
                }
                if($detail['unit_id'] == $detail->product->lg_unit_id ) {
                    $unit_amount = $detail->product->lg_sm_amount * $detail['amount'] ;
                    $new_amount = $detail->product->amount + $unit_amount;
                }
                $detail->product->update(['amount' => $new_amount]);
            } else {
                $detail->offer->update(['amount' => $detail->offer->amount + $detail['amount']]);
            }
        }

        return apiResponse($order);
    }
    /*================================================*/
    public function accept_order_schedule(){
        $setting = Setting::first();
        if (date('H' ,strtotime('+2hours') ) == date('H' ,strtotime($setting->order_time))){
            Order::where('status','waiting')->update(['status'=>'new']);
            return apiResponse(null,'done successfully');
        }
        return apiResponse(null,'date does not come yet');
    }
}
