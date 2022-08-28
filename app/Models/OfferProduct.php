<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferProduct extends Model
{
    protected $guarded = [];

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id');
    }
}
