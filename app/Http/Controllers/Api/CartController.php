<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\ProductTrait;

class CartController extends Controller
{
     use ProductTrait;
    public function add_cart(Request $request){
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
        return apiResponse($carts);
    }
}
