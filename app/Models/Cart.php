<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    protected $guarded = [];

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function offer(){
        return $this->belongsTo(Offer::class,'offer_id');
    }
    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id');
    }

    protected $appends = ['unit_price','total_price'];

    public function getUnitPriceAttribute(){
        if ($this->type == 'product'){
            if ($this->unit_id == $this->product()->pluck('lg_unit_id')->first()){
                return $this->product()->pluck('lg_unit_price')->first();
            }else{
                return $this->product()->pluck('sm_unit_price')->first();
            }
        }else{
            return $this->offer()->pluck('price')->first();
        }
    }

    public function getTotalPriceAttribute(){
        return $this->getUnitPriceAttribute() * $this->amount;
    }
}
