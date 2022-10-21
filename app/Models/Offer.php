<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use App\Http\Traits\ProductTrait;

class Offer extends Model
{
//    use ProductTrait;
    protected $guarded = [];
    protected $appends = ['count'];

    public function getImageAttribute(){
        return  get_file($this->attributes['image']);
    }

    public function offerProducts(){
        return $this->hasMany(OfferProduct::class,'offer_id');
    }
    public function getCountAttribute(){
        $this->count = 0;

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
            // add count of offer in cart
            $cart_count = Cart::where(['type' => 'offer','user_id' => $user->id, 'offer_id' => $this->id])
                ->first();

            if ($cart_count) return $cart_count->amount;
            else return 0;
            // end add count of offer in cart

        } else {
            return 0;
        }
    }
}
