<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupons';
    protected $guarded = [];

    public function coupon_users(){
        return $this->hasMany(CouponUser::class, 'coupon_id');
    }
}
