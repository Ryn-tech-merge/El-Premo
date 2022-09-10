<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function setting(){
        $setting = Setting::first();
        $setting->terms_link = url('terms');
        $setting->privacy_link = url('privacy');
        return apiResponse($setting);
    }
}
