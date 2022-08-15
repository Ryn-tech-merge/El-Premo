<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function getImageAttribute(){
        return  get_file($this->attributes['image']);
    }
}
