<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function getImageAttribute(){
        return  get_file($this->attributes['image']);
    }

    public function categoryBrands(){
        return $this->hasMany(CategoryBrand::class,'category_id');
    }
    public function brand_ids(){
        return $this->categoryBrands()->pluck('brand_id');
    }
}
