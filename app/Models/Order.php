<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
//    protected $appends = ['delivery_day_en','delivery_day_ar'];
    protected $appends = ['order_date_format'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function order_details(){
        return $this->hasMany(OrderDetails::class,'order_id');
    }

//    public function coupon(){
//        return $this->belongsTo(Coupon::class,'coupon_id');
//    }

//
//    public function getDeliveryDayEnAttribute(){
//        $setting = Setting::first();
//        $date = date('l' ,strtotime($this->created_at . '+'.$setting->delivery_days.'day') ) ;
//        return $date;
//    }
//
//    public function getDeliveryDayArAttribute(){
//        $setting = Setting::first();
//        $date = date('D' ,strtotime($this->created_at . '+'.$setting->delivery_days.'day') ) ;
//        $days = ["Sat" => "السبت", "Sun" => "الأحد", "Mon" => "الإثنين", "Tue" => "الثلاثاء", "Wed" => "الأربعاء", "Thu" => "الخميس", "Fri" => "الجمعة"];
//        return $days[$date];
//    }
    public function getOrderDateFormatAttribute(){
        $order_date = date('Y-m-d' ,strtotime($this->created_at) ) ;
        $order_day = date('d' ,strtotime($this->created_at) ) ;
        $order_hour = date('H:i' ,strtotime($this->created_at) ) ;
        $order_period_en = date('A' ,strtotime($this->created_at) ) ;
        $order_period_ar = $order_period_en == 'AM' ? 'ص' : 'م';
        $days = ["Sat" => "السبت", "Sun" => "الأحد", "Mon" => "الإثنين", "Tue" => "الثلاثاء", "Wed" => "الأربعاء", "Thu" => "الخميس", "Fri" => "الجمعة"];
        $months = ["Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر"];
        $order_month_en =  date('M' ,strtotime($this->created_at) ) ;
        $order_month_ar = $months[$order_month_en];
        $order_day_en = date('l' ,strtotime($this->created_at ) ) ;
        $order_day_ar = date('D' ,strtotime($this->created_at ) ) ;


        $setting = Setting::first();
        $delivery_day_en = date('l' ,strtotime($this->created_at . '+'.$setting->delivery_days.'day') ) ;
        $delivery_day_ar = date('D' ,strtotime($this->created_at . '+'.$setting->delivery_days.'day') ) ;

        return ['order_date'=>$order_date,'order_hour'=>$order_hour,'order_period_en'=>$order_period_en,'order_period_ar'=>$order_period_ar,
            'order_day'=>$order_day,'order_month_en'=>$order_month_en,'order_month_ar'=>$order_month_ar,
            'order_day_en'=>$order_day_en,'order_day_ar'=>$days[$order_day_ar],
            'delivery_day_en'=>$delivery_day_en,'delivery_day_ar'=>$days[$delivery_day_ar] ];
    }

}
