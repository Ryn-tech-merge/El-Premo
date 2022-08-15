<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $guarded = [];
    protected $appends = ['shop_address_link'];

    public function getShopImageAttribute(){
        return  $this->attributes['shop_image'] ;
    }
    public function getShopAddressLinkAttribute(){
        return 'https://www.google.com/maps/@'.$this['latitude'].','.$this['longitude'].',15z';
    }
}
