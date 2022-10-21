<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    public function notifications(){
        Notification::where('user_id',Auth::guard('user_api')->user()->id)->update(['is_read'=>true]);
        $notifications = Notification::where('user_id',Auth::guard('user_api')->user()->id)->get();
        return apiResponse($notifications);
    }//end fun
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getNotificationsCount()
    {
        $notificationsCount = Notification::where('user_id',Auth::guard('user_api')->user()->id)->where('is_read',false)->count();
        return apiResponse($notificationsCount);
    }//end fun

    public function deleteNotifications(Request $request)
    {
        $validator = Validator::make($request->all(), [ // <---
            'notification_id' => 'required',
        ]);
        if ($validator->fails()) {
            return apiResponse(null,$validator->errors(),'422');
        }

        if ($request->notification_id)
        {
            Notification::destroy($request->notification_id);
        }else{
            Notification::where('user_id',Auth::guard('user_api')->user()->id)->delete();
        }
        return apiResponse(null,'done');
    }

}
