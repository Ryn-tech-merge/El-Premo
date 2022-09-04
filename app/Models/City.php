<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';
    public function governorate(){
        return $this->belongsTo(Governorate::class, 'governorate_id');
    }
}
