<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryBrand extends Model
{
    protected $guarded = [];
    protected $table = 'category_brands';


    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
}
