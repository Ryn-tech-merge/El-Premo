<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    protected $table = 'governorate';

    public function cities(){
        return $this->hasMany(City::class, 'governorate_id');
    }
    public function users(){
        return $this->hasMany(User::class, 'governorate_id');
    }
}
