<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\User;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Offer;
use App\Models\OrderDetails;
use App\Models\Governorate;
use App\Models\Setting;
use App\Models\Target;

class HomeController extends Controller
{
    public function index(Request $request){
        $created_from = $request->created_from ? date('Y-m-d',strtotime($request->created_from)):date('Y-m-d' , strtotime('-1 month'));
        $created_to = $request->created_to ?date('Y-m-d' ,strtotime($request->created_to)):date('Y-m-d' );

        $chart_day_array = $chart_order_array = [];
        $chart_order_count = 0;

        //*************** total profit and income chart ******************
        $details = OrderDetails::where('type','product')->get();
        $total_profit = $total_income = 0;
        foreach ($details as $detail){
            if ($detail->product ){
                if ($detail->unit_id == $detail->product->sm_unit_id){
                    $total_income += $detail->amount * $detail->product->sm_unit_price  ;
                    $total_profit += $detail->amount * ($detail->product->sm_unit_price - $detail->product->purchase_price) ;
                }elseif ($detail->unit_id == $detail->product->lg_unit_id ){
                    $total_income += ($detail->amount * $detail->product->lg_sm_amount) *  $detail->product->sm_unit_price   ;
                    $total_profit += ($detail->amount * $detail->product->lg_sm_amount) * (  $detail->product->sm_unit_price  - $detail->product->purchase_price) ;
                }
            }
        }

        for($i= 30 ; $i>=0 ; $i--){
            array_push($chart_day_array , (string)date('d/m',strtotime('-'.$i.'day') ) );
            $order = Order::where(['status'=>'ended','delivery_date'=> date('Y-m-d' ,strtotime('-'.$i.'day') )])->count();
            $chart_order_count += $order;
            array_push($chart_order_array , (string)$order );
        }
        //*************** end total profit and income chart ******************
        //*************** start governorate chart ******************
//        return [$chart_day_array , $chart_order_array];
        $governorates = Governorate::whereHas('users')->get();
        $governorates_array = [];
        foreach ($governorates as $governorate){
            $governorate->user_count = User::where('governorate_id',$governorate->id)->whereBetween('created_at',[$created_from,$created_to])->count();
            if ($governorate->user_count > 0)
                $governorates_array[] = $governorate;
        }
        //*************** end governorate chart ******************

        //*************** start most sell products chart ******************
        $products = OrderDetails::where('type','product')
            ->with('product.category','product.brand','product.sm_unit','product.lg_unit')->get();
        $collection = collect([]);
        $products->each(function ($item) use ($collection) {
            $target = $collection->where('product_id', $item->product_id);
            if ($target->count()==0)
            {
                $collection->push($item);
            }
        });
        foreach ($collection as $product){
            if ($product->product ){
                $product->count = $product->product->count = OrderDetails::where('product_id', $product->product_id)->count();
                if ($product->unit_id == $product->product->sm_unit_id){
                    $product->product->total_income += $product->amount * $product->product->sm_unit_price  ;
                    $product->product->total_profit += $product->amount * ($product->product->sm_unit_price - $product->product->purchase_price) ;
                }elseif ($product->unit_id == $product->product->lg_unit_id ){
                    $product->product->total_income += ($product->amount * $product->product->lg_sm_amount) *  $product->product->sm_unit_price   ;
                    $product->product->total_profit += ($product->amount * $product->product->lg_sm_amount) * (  $product->product->sm_unit_price  - $product->product->purchase_price) ;
                }
            }
        }
//        return $collection;
        $collection = $collection->sortByDesc("count");
        $arrays = [] ;
        foreach($collection as $product)
        {
            $arrays[] = $product->product;
        }
        $most_sell_products =  array_slice( $arrays, 0, 10 );

        //*************** end most sell products chart ******************

        //*************** start most sell client chart ******************
//        $setting = Setting::first();
        $most_clients  = User::orderBy('points','desc')->paginate(10);
        $most_purchase_clients = [];
        foreach ($most_clients as $client){
            $client_orders = Order::where(['user_id'=>$client->id,'status'=>'ended']);
            if ($client_orders->count()>0){
                $client->total_purchases = $client_orders->sum('total');
                $client->purchase_num = $client_orders->count();
                $most_purchase_clients[] = $client;
            }
        }
//        return $most_purchase_clients;
        //*************** end most sell client chart ******************

        //*************** start target clients chart ******************
//        $setting = Setting::first();
        $target = Target::orderBy('gifts_for')->first();
        $target_clients  = User::where('points','>=',$target->gifts_for)->orderBy('points','desc')->paginate(10);
        $most_target_clients = [];
        foreach ($target_clients as $client){
            $client_orders = Order::where(['user_id'=>$client->id,'status'=>'ended']);
                $client->total_purchases = $client_orders->sum('total');
                $client->target = Target::where('gifts_for','<=',$client->points)->orderBy('gifts_for','desc')->first();
                $most_target_clients[] = $client;
        }
        //*************** end target clients chart ******************

        $order_count = Order::where('status','!=','waiting')->whereBetween('created_at',[$created_from,$created_to])->count();
        $user_count = User::whereBetween('created_at',[$created_from,$created_to])->count();
        $admin_count = Admin::whereBetween('created_at',[$created_from,$created_to])->count();
        $category_count = Category::whereBetween('created_at',[$created_from,$created_to])->count();
        $brand_count = Brand::whereBetween('created_at',[$created_from,$created_to])->count();
        $contact_count = Contact::whereBetween('created_at',[$created_from,$created_to])->count();
        $product_count = Product::whereBetween('created_at',[$created_from,$created_to])->count();
        $offer_count = Offer::whereBetween('created_at',[$created_from,$created_to])->count();

        $new_order_count = Order::whereBetween('created_at',[$created_from,$created_to])->where('status','new')->count();
        $on_going_order_count = Order::whereBetween('created_at',[$created_from,$created_to])->where('status','on_going')->count();
        $delivery_order_count = Order::whereBetween('created_at',[$created_from,$created_to])->where('status','delivery')->count();
        $ended_order_count = Order::whereBetween('created_at',[$created_from,$created_to])->where('status','ended')->count();
        $canceled_order_count = Order::whereBetween('created_at',[$created_from,$created_to])->where('status','canceled')->count();

//        return $date;
        return view('Admin.index',['created_from'=>$created_from,'created_to'=>$created_to],
            compact('chart_day_array','chart_order_array','chart_order_count','total_profit','total_income',
               'most_target_clients','most_sell_products' , 'most_purchase_clients' ,'governorates_array' , 'order_count','user_count','admin_count',
            'category_count','brand_count','contact_count','product_count','offer_count','new_order_count',
            'on_going_order_count','delivery_order_count','ended_order_count','canceled_order_count'));
    }

    //###################################################

}
