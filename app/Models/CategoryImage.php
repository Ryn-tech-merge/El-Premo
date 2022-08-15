<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryImage extends Model
{
    protected $guarded = [];
    public function getImageAttribute(){
        return  get_file($this->attributes['image']);
    }
}
