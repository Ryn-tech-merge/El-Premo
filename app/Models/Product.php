<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\ProductTrait;


class Product extends Model
{
    use ProductTrait;
    protected $guarded = [];
    public function getImageAttribute(){
        return  get_file($this->attributes['image']);
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function sm_unit(){
        return $this->belongsTo(Unit::class,'sm_unit_id');
    }
    public function lg_unit(){
        return $this->belongsTo(Unit::class,'lg_unit_id');
    }

    public function orders(){
        return $this->hasMany(Order::class,'product_id');
    }



}
