<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $guarded = [];

    public function getImageAttribute(){
        return  get_file($this->attributes['image']);
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function offer(){
        return $this->belongsTo(Offer::class,'product_id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'product_id');
    }

}
