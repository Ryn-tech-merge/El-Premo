<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable implements JWTSubject
{
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }

    protected $guarded = [];
    protected $appends = ['shop_address_link'];


    public function getImageAttribute(){
        return  get_file($this->attributes['image']);
    }
    public function getShopAddressLinkAttribute(){
        return 'https://www.google.com/maps/@'.$this['latitude'].','.$this['longitude'].',15z';
    }
    
    public function governorate(){
        return $this->belongsTo(Governorate::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }
    public function wallets(){
        return $this->hasMany(Wallet::class,'user_id');
    }
}
