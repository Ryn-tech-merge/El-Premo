<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Coupon;
use App\Models\CouponUser;

class CouponController extends Controller
{
    public function coupon(Request $request){
        $validator = Validator::make($request->all(),[
            'code'=>'required',
        ]);
        if ($validator->fails()){
            return apiResponse('',$validator->errors(),'422');
        }

        $coupon = Coupon::where(['is_available'=>'yes','code'=>$request->code])
           ->where(function ($query){
                $query->where('start_date','<=',date('Y-m-d'))
                    ->orwhere('start_date',null);
            })
            ->where(function ($query){
                $query->where('end_date','>=',date('Y-m-d'))
                    ->orwhere('end_date',null);
            })
            ->first();

        if ($coupon){
            $coupon_user = CouponUser::where(['coupon_id'=>$coupon->id,'user_id'=>Auth::guard('user_api')->user()->id])->first();
            if($coupon_user){
                if ($coupon_user->is_paid == 'no')
                    return apiResponse($coupon);
                else
                    return apiResponse('','coupon is used before from the user',411);
            }else{
                return apiResponse('','coupon is not allowed for this user',410);
            }
        }else{
            return apiResponse('','coupon is wrong',409);
        }
      
    }
}
