<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Offer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\ProductTrait;

class CartController extends Controller
{
     use ProductTrait;
    public function add_cart(Request $request){

        //####################  amount validation ###########################
        if ($request->type == 'product') {
            $product = Product::where('id', $request->product_id)->first();
            if ($product){
                if ($request->unit_id == $product->sm_unit_id) {
                    if ($product->amount < $request->amount) {
                        return apiResponse(null, 'الكمية غير متاحة', '422');
                    }
                }
                if ($request->unit_id == $product->lg_unit_id) {
                    $lg_amount = $product->amount / $product->lg_sm_amount;
                    if ($lg_amount < $request['amount']) {
                        return apiResponse(null, 'الكمية غير متاحة', '422');
                    }
                }
            }
        } else {
            $offer = Offer::where('id',$request->offer_id)->first();
            if ($offer) {
                if ($offer->amount < $request->amount) {
                    return apiResponse(null, 'الكمية غير متاحة', '422');
                }
            }
        }

        //####################  end amount validation ###########################


        $data = $request->except('amount');
        $data['user_id']    = Auth::guard('user_api')->user()->id;
//        $cart = Cart::create($data);
        $cart=Cart::updateOrCreate($data);
        $cart->amount = $request->amount;
        $cart->save();

        if ($cart->product) $cart->product = $this->get_product_max_sm_amount($cart->product);
        $cart->offer = $cart->offer;
        $cart->unit = $cart->unit;

        return apiResponse($cart);
    }
//==================================================================================
    public function update_cart(Request $request){
        $validator = Validator::make($request->all(),[
            'id'    =>'required|exists:cart,id',
        ]);
        if ($validator->fails()){
            return apiResponse(null,$validator->errors(),'422');
        }
        $data = $request->all();
        $data['user_id']    = Auth::guard('user_api')->user()->id;
        $cart = Cart::with('product','offer','unit')->where('id',$request->id)->first();
        $cart->update($data);
        if ($cart->product) $cart->product = $this->get_product_max_sm_amount($cart->product);

        return apiResponse($cart);
    }
//==================================================================================

    public function delete_cart(Request $request){
        $validator = Validator::make($request->all(),[
            'id'    =>'required|exists:cart,id',
        ]);
        if ($validator->fails()){
            return apiResponse(null,$validator->errors(),'422');
        }
        Cart::where('id',$request->id)->delete();
        return apiResponse(null,'deleted successfully');
    }
//==================================================================================

    public function get_cart(Request $request){
        $carts = Cart::with('product','offer','unit')->where('user_id',Auth::guard('user_api')->user()->id)->get();
        foreach ($carts as $cart){
            if ($cart->product) $cart->product = $this->get_product_max_sm_amount($cart->product);
        }

        $setting = Setting::first();
        $setting->terms_link = url('terms');
        $setting->privacy_link = url('privacy');
        $setting->count_orders = 0;
        if (Auth::guard('user_api')->check())
            $setting->count_orders = Order::where('status','!=','canceled')
                ->where('user_id',Auth::guard('user_api')->user()->id)->count();

        $data['cart'] = $carts;
        $data['setting'] = $setting;

        $data['new_order'] = true;
        if (Order::where('user_id', Auth::guard('user_api')->id())->where('status','waiting')->count()){
            $data['new_order'] = false;
        }

        return apiResponse($data);
    }
}
