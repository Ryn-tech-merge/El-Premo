<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function notifications(){
        $notifications = Notification::where('user_id',Auth::guard('user_api')->user()->id)->get();
        return apiResponse($notifications);
    }
}
