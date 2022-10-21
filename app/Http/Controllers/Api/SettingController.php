<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function setting(){
        $setting = Setting::first();
        $setting->terms_link = url('terms');
        $setting->privacy_link = url('privacy');
        $setting->count_orders = 0;
        if (Auth::guard('user_api')->check())
        $setting->count_orders = Order::where('status','!=','canceled')
            ->where('user_id',Auth::guard('user_api')->user()->id)->count();
        return apiResponse($setting);
    }
}
