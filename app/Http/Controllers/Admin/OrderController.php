<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Models\Order;
use App\Models\Setting;
use App\Models\Wallet;
use App\Models\Target;
use App\Models\OrderDetails;
use App\Models\Notification;

class OrderController extends Controller
{
    public function orderStatus($order_status){
        if ($order_status == 'waiting'){
            $status = 'تحت الطلب';
            $color = 'secondary';
        }
        elseif ($order_status == 'on_going'){
            $status = 'جارى التحضير';
            $color = 'primary';
        }
        elseif ($order_status == 'delivery'){
            $status = 'جارى التوصيل';
            $color = 'primary';
        }
        elseif ($order_status==='ended'){
            $status = 'منتهى' ;
            $color = 'success';
        }
        elseif ($order_status=== 'canceled'){
            $status = 'تم الالغاء' ;
            $color = 'warning';
        }
        else{
            $status = 'جديد' ;
            $color = 'info';
        }

        return ['status'=>$status,'color'=>$color];
    }
//#################################################################
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $created_from = $request->created_from ? date('Y-m-d',strtotime($request->created_from)):date('1970-1-1');
            $created_to = $request->created_to ?date('Y-m-d' ,strtotime($request->created_to)):date('Y-m-d' , strtotime('+1 week'));
            $delivery_from = $request->delivery_from ? date('Y-m-d',strtotime($request->delivery_from)):date('1970-1-1');
            $delivery_to = $request->delivery_to ? date('Y-m-d' ,strtotime($request->delivery_to)):date('Y-m-d',strtotime('+1 week'));
            $status =  $request->status!=null? [$request->status]:['waiting','new','on_going','delivery','ended','canceled'];
            $status = $request->status=='all' ? ['waiting','new','on_going','delivery','ended','canceled'] :$status;
//            return $status;
            $orders = Order::with('user')
                ->whereIn('status',$status)
                ->whereBetween('created_at',[$created_from,$created_to])
                ->whereBetween('delivery_date',[$delivery_from,$delivery_to])
                ->latest()->get();
            return Datatables::of($orders)
                ->addColumn('action', function ($order) {
                    if(in_array(40,admin()->user()->permission_ids)) {
                        return '
                            <button class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                                 data-id="' . $order->id . '" ><i class="fa fa-trash-o text-white"></i>
                            </button>
                       ';
                    }

                })
                ->editColumn('status',function ($order){
                    $order_status =  $this->orderStatus($order->status);
//                    $button = '';
//                    if ($order->status != 'ended' && $order->status != 'canceled' ) {
                        $statusBtn =in_array(41,admin()->user()->permission_ids)? "statusBtn" : " ";
                        $button = '<div class="card-options pr-2">
                                    <a class="btn btn-sm '. $statusBtn .'" style="background-color: #0ea5b9;color: white" href="'.route("change_order_status",$order->id).'"><i class="fa fa-pencil mb-0"></i></a>
                                </div>';
//                    }
                    return '
                            <div class="card-header pt-0  pb-0 border-bottom-0">
                            <a  class="badge badge-'. $order_status['color'] .' text-white ">'. $order_status['status']  .'</a>
                                '.$button.'
                            </div>
							';
                })
                ->addColumn('details',function ($order){
                    return '<div class="card-options pr-2">
                                    <a class="btn btn-sm btn-primary text-white statusBtn"  href="' .route("order_details",$order->id).'"><i class="fa fa-book mb-0"></i></a>
                           </div>';
                })
                ->addColumn('user',function ($order){
                    return $order->user->name ?? 'مستخدم محذوف' ;
                })
                ->escapeColumns([])
                ->make(true);
        }

        return view('Admin.CRUD.Order.index');
    }


    ################ Delete Order #################
    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }

    ################ change_order_status #################
    public function change_order_status($id)
    {
        $order = Order::where('id',$id)->first();
        return view('Admin.CRUD.Order.parts.status',compact('order'))->render();
    }
    ################ change_order_status #################
    public function update_order_status(Request $request)
    {
        $order = Order::where('id',$request->id)->first();
        if ($order->status == 'ended' && $request->status != 'ended'){
            $user           = $order->user;
            $wallets = Wallet::where('user_id',$user->id)->where('order_id',$order->id)->get();
            foreach ($wallets as $wallet) {
                $user->wallet -= $wallet->price ;
                $wallet->delete();
            }
            $user->points   -= $order->total; //total purchases
            $user->wallet   += $order->wallet_paid; //money paid from wallet
            $user->save();
        }

        $order->update(['status'=>$request->status]);

        if ($order->status == 'ended'){
        // Wallet
//            $setting        = Setting::first();
            $user           = $order->user;
            $user->points   += $order->total; //total purchases
            $user->save();

            if ($user->wallet >= $order->total){
                $order->wallet_paid = $order->total;
                $order->cash_paid   = 0;
                $order->save();
                $user->wallet -= $order->total;
                $user->save();

                $wallet = new Wallet ;
                $wallet->order_id   = $order->id;
                $wallet->user_id    = $user->id;
                $wallet->type       = 'purchases';
                $wallet->price      = -$order->total;
                $wallet->save();
            }else{
                $order->wallet_paid = $user->wallet;
                $order->cash_paid = $order->total - $user->wallet;
                $order->save();
                $user->wallet = 0;
                $user->save();

                if ($user->wallet > 0){
                    $wallet = new Wallet ;
                    $wallet->order_id   = $order->id;
                    $wallet->user_id    = $user->id;
                    $wallet->type       = 'purchases';
                    $wallet->price      = -$user->wallet;
                    $wallet->save();
                }
            }

            $wallet_money = Wallet::where('user_id',$user->id)->sum('price');
            $targets = Target::where('gifts_for','>',$wallet_money)->orderBy('gifts_for')->get();
            foreach ($targets as $target){
                if ($target->gifts_price <= $user->points){
                    $wallet = new Wallet ;
                    $wallet->order_id   = $order->id;
                    $wallet->user_id    = $user->id;
                    $wallet->type       = 'purchases';
                    $wallet->price      = $target->gifts_price;
                    $wallet->save();

                    $user->wallet   +=  $target->gifts_price;
                    $user->save();
                }
            }


        //end Wallet
        }

        if ($order->status == 'canceled'){

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

        }

        $notification = new Notification ;
        $notification->user_id = $order->user_id;
        $notification->title = 'تم تغيير حالة طلبك';
        $notification->message = 'طلبك رقم ' . $order->id . ' ' . $this->orderStatus($order->status)['status'];
        $notification->save();

        return response()->json(
            [
                'success' => 'true',
                'message' => 'تم تغيير الحالة بنجاح '
            ]);
    }

    ##############################################

    ################ order_details #################
    public function order_details($id)
    {
        $order = Order::with('order_details')->where('id',$id)->first();
        return view('Admin.CRUD.Order.parts.details',compact('order'))->render();
    }
}
