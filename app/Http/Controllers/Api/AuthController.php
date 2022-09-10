<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use \Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Setting;
use App\Models\PhoneToken;
use App\Http\Traits\PhotoTrait;

class AuthController extends Controller
{
    use PhotoTrait;

    public function login(Request $request){
        try {
            // validation
            $validator = Validator::make($request->all(),[
                'phone_code' => 'required',
                'phone'=>'required'
            ]);
            if ($validator->fails()){
                return apiResponse(null,$validator->errors(),'422');
            }
            $validator = Validator::make($request->all(),[
                'phone'=>'exists:users,phone'
            ]);
            if ($validator->fails()){
                return apiResponse(null,'invalid credentials register please ','409');
            }


            //login
            $credentials = ['phone_code'=>$request->phone_code , 'phone'=>$request->phone];
            $user = User::with('governorate','city')->where($credentials)->first(); // generate token
            if ($user){
//                if ($user->is_active == 'no')
//                    return apiResponse('',' لم يتم قبول حسابك من الادارة ','410');
//                if ($user->block == 'yes')
//                    return apiResponse('',' تم حظر حسابك من الادارة ','410');

                $user->token = Auth::guard('user_api')->login($user); // generate token
                return apiResponse($user);
            }else{
                return apiResponse(null,'invalid credentials register please ','409');
            }

        }catch (\Exception $ex){
            return apiResponse($ex->getCode(),$ex->getMessage(),'422');
        }


    }
    //===========================================

    public function register(Request $request){
        try {
            // validation
            $validator = Validator::make($request->all(),[
                'phone'=>'required|unique:users,phone',
                'email'=>'nullable|unique:users,email',
                'name'=>'required',
                'city_id'=>'required',
                'governorate_id'=>'required',
                'image'=>'nullable',
            ]);
            if ($validator->fails()){
                return apiResponse(null,$validator->errors(),'422');
            }
            $data = $request->all();
            $data['phone_code'] = $request->phone_code ?? '+20' ;
            if ($request->image && $request->image != null)
                $data['image']    = 'uploads/users/'.$this->saveImage($request->image,'uploads/users');
            $user = User::create($data);

            $token = Auth::guard('user_api')->login($user); // generate token

            // Wallet
            $setting = Setting::first();
            $user->points += $setting->register_gift;
            $user->save();
            $wallet = new Wallet ;
            $wallet->user_id  = Auth::guard('user_api')->user()->id;
            $wallet->type = 'register';
            $wallet->price = $setting->register_gift;
            $wallet->save();
            //end Wallet

            $user = User::where('id', $user->id)->with('governorate','city')->first();
            $user->token = $token;

            return apiResponse($user);

        }catch (\Exception $ex){
            return apiResponse($ex->getCode(),$ex->getMessage(),'422');
        }


    }


    //==============================================================================
    public function insert_token(Request $request)
    {
//        return Auth::guard('user_api')->user()->id;
        $validator = Validator::make($request->all(), [
            'token' => 'required',
        ]);
        if ($validator->fails()) {
            return apiResponse(null,$validator->errors(),'422');
        }
        $token=PhoneToken::updateOrCreate([
            'user_id'=>Auth::guard('user_api')->user()->id ,
            'phone_token'=>$request->token,
            'type'=>$request->type,
        ]);
        return apiResponse($token);
    }

    //=======================================================================================================

    public function logout(Request $request){
        $validator = Validator::make($request->all(), [ // <---
            'token' => 'required',
        ]);
        if ($validator->fails()) {
            return apiResponse(null,$validator->errors(),'422');
        }
        PhoneToken::where(['user_id' => Auth::guard('user_api')->user()->id, 'phone_token' => $request->token])->delete();

        $token = getToken();
        if ($token != null){
            try {
                JWTAuth::setToken($token)->invalidate(); // logout user
                return apiResponse(null,'logout done');
            }catch(TokenInvalidException $e){
                return apiResponse(null,'some thing went wrong','422');
            }
        }
        else{
            return apiResponse(null,'some thing went wrong','422');
        }
    }
    //===========================================
    public function profile(Request $request){
        $user = User::where('id',Auth::user()->id)->with('governorate','city')->first();
        $user->token = getToken();
        return apiResponse($user);
    }
    //===========================================
    public function update_profile(Request $request){
        $validator = Validator::make($request->all(),[
            'phone_code'=>'required',
            'phone'=>'required|unique:users,phone,'.Auth::user()->id,
//            'email'=>'nullable|unique:users,email,'.Auth::user()->id,
            'name'=>'required',
            'image'=>'nullable',
        ]);
        if ($validator->fails()){
            return apiResponse(null,$validator->errors(),'422');
        }
        $user = User::where('id',Auth::user()->id)->with('governorate','city')->first();
        $data = $request->all();
        if (isset($request->image) && $request->image != ''){
            if (file_exists($user->getAttributes()['image'])) {
                unlink($user->getAttributes()['image']);
            }
            $data['image']    = 'uploads/users/'.$this->saveImage($request->image,'uploads/users');
        }else{
            $data = $request->except('image');
        }
        $user->update($data);
        $user->token = getToken();

        return apiResponse($user);
    }
}
