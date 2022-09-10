<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $guarded = [];

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function offer(){
        return $this->belongsTo(Offer::class,'product_id');
    }
    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id');
    }
    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }
}
