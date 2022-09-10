<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;


class SettingController extends Controller
{
    public function index(){
        $setting = Setting::first();
        return view('Admin.Setting.index',compact('setting'));
    }
    public function update(Request $request , Setting $setting){
//        return $request->all();

        $setting->update($request->all());
        return response()->json(['messages' => ['تم تعديل الاعدادات بنجاح'], 'success' => 'true']);
    }
}
