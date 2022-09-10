<?php


namespace App\Http\Traits;

use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use JWTAuth;
use App\Models\OrderDetails;
use App\Models\Cart;

trait  ProductTrait
{

    function get_product_max_sm_amount($product)
    {

        $product->count = 0;
        $product->lg_count = 0;

        if ($product->amount < $product->max_sm_amount) {
            $product->max_sm_amount = $product->amount;
        }
        $lg_amount = $product->amount / $product->lg_sm_amount;
        if ( $lg_amount < $product->max_lg_amount) {
            $product->max_lg_amount = $lg_amount;
        }

//        $token = JWTAuth::parseToken()->authenticate();
    ////check authenticated user or not
        $token = null;
        if (request()->header('auth_token') && request()->header('auth_token') != null)
            $token = request()->header('auth_token');
        elseif (request()->get('auth_token') && request()->get('auth_token') != null)
            $token = request()->get('auth_token');
        elseif (request()->auth_token && request()->auth_token != null)
            $token = request()->auth_token;

        if ($token == null){
            if (request()->header('Authorization') && request()->header('Authorization') != null)
                $token = request()->header('Authorization');
            elseif (request()->get('Authorization') && request()->get('Authorization') != null)
                $token = request()->get('Authorization');
            elseif (request()->Authorization && request()->Authorization != null)
                $token = request()->Authorization;
        }
        ////end check authenticated user or not

        if ($token) {
            $user = \Tymon\JWTAuth\Facades\JWTAuth::setToken($token)->toUser();
            // add count of product in cart
//            $cart_lg_unit = Cart::where(['type' => 'product','user_id' => $user->id,/*'unit_id' => $product->lg_unit_id,*/ 'product_id' => $product->id])
//                ->first();
            $cart_count = Cart::where(['type' => 'product','user_id' => $user->id/*,'unit_id' => $product->sm_unit_id*/, 'product_id' => $product->id])
                ->first();

            if ($cart_count) $product->count = $cart_count->amount;
//            if ($cart_lg_unit) $product->lg_count = $cart_lg_unit->amount;

            // end add count of product in cart

            // update product large and small max amount for authenticated user
            $order_details_sm_unit = OrderDetails::whereHas('order', function ($query) use($user) {
                $query->where(['user_id' => $user->id, 'status' => 'waiting']);
            })
                ->where(['unit_id' => $product->sm_unit_id, 'product_id' => $product->id])
                ->first();

            $order_details_lg_unit = OrderDetails::whereHas('order', function ($query) use($user) {
                $query->where(['user_id' => $user->id, 'status' => 'waiting']);
            })
                ->where(['unit_id' => $product->lg_unit_id, 'product_id' => $product->id])
                ->first();

            if ($order_details_sm_unit) {
                $product->max_sm_amount = $product->max_sm_amount - $order_details_sm_unit->amount;
                if ($product->amount < $product->max_sm_amount) {
                    $product->max_sm_amount = $product->amount;
                }
                return $product;
            }
            if ($order_details_lg_unit){
                $product->max_lg_amount = $product->max_lg_amount - $order_details_lg_unit->amount;
                $lg_amount = $product->amount / $product->lg_sm_amount;
                if ( $lg_amount < $product->max_lg_amount) {
                    $product->max_lg_amount = $lg_amount;
                }
                return $product;
            }
            //end update product large and small max amount for authenticated user
//            dd($product);
            return $product;
        } else {
            return $product;
        }
    }

    //******************************* fun for array of products ***************************************

    function get_products_max_sm_amount($products)
    {
        if (is_array($products) || is_object($products)) {
            foreach ($products as $product) {
                $product =$this->get_product_max_sm_amount($product);
            }
        }
        return $products;
    }
}
