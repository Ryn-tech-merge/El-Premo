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

class HomeController extends Controller
{
    public function index(){
//        return 1;
        $date7 = date('D');
        $date6 = date('D' ,strtotime('-1day') );
        $date5 = date('D' ,strtotime('-2day') );
        $date4 = date('D' ,strtotime('-3day') );
        $date3 = date('D' ,strtotime('-4day') );
        $date2 = date('D' ,strtotime('-5day') );
        $date1 = date('D' ,strtotime('-6day') );

        $order7 = Order::where(['status'=>'ended','delivery_date'=> date('Y-m-d')])->count();
        $order6 = Order::where(['status'=>'ended','delivery_date'=> date('Y-m-d' ,strtotime('-1day') )])->count();
        $order5 = Order::where(['status'=>'ended','delivery_date'=> date('Y-m-d' ,strtotime('-2day') )])->count();
        $order4 = Order::where(['status'=>'ended','delivery_date'=> date('Y-m-d' ,strtotime('-3day') )])->count();
        $order3 = Order::where(['status'=>'ended','delivery_date'=> date('Y-m-d' ,strtotime('-4day') )])->count();
        $order2 = Order::where(['status'=>'ended','delivery_date'=> date('Y-m-d' ,strtotime('-5day') )])->count();
        $order1 = Order::where(['status'=>'ended','delivery_date'=> date('Y-m-d' ,strtotime('-6day') )])->count();

        $order_count = Order::where('status','!=','waiting')->count();
        $user_count = User::count();
        $admin_count = Admin::count();
        $category_count = Category::count();
        $brand_count = Brand::count();
        $contact_count = Contact::count();
        $product_count = Product::count();
        $offer_count = Offer::count();

        $new_order_count = Order::where('status','new')->count();
        $on_going_order_count = Order::where('status','on_going')->count();
        $delivery_order_count = Order::where('status','delivery')->count();
        $ended_order_count = Order::where('status','ended')->count();
        $canceled_order_count = Order::where('status','canceled')->count();

//        return $date;
        return view('Admin.index',
            compact('order1','order2','order3','order4','order5','order6','order7',
            'date1','date2','date3','date4','date5','date6','date7','order_count','user_count','admin_count',
            'category_count','brand_count','contact_count','product_count','offer_count','new_order_count',
            'on_going_order_count','delivery_order_count','ended_order_count','canceled_order_count'));
    }

    //###################################################

}
