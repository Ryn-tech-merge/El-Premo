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
                'phone'=>'required'
            ]);
            if ($validator->fails()){
                return apiResponse('',$validator->errors(),'422');
            }
            $validator = Validator::make($request->all(),[
                'phone'=>'exists:users,phone'
            ]);
            if ($validator->fails()){
                return apiResponse('','invalid credentials register please ','409');
            }


            //login
            $credentials = ['phone'=>$request->phone];
            $user = User::where($credentials)->first(); // generate token
            $token = Auth::guard('user_api')->login($user); // generate token
            if (!$token)
                return apiResponse('','invalid credentials','409');

            $user->token = $token;
            return apiResponse($user,'','200');

            //token
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
                'image'=>'nullable',
            ]);
            if ($validator->fails()){
                return apiResponse('',$validator->errors(),'422');
            }
            $data = $request->all();

            if ($request->image && $request->image != null)
                $data['image']    = 'uploads/users/'.$this->saveImage($request->image,'uploads/users');
            $user = User::create($data);

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

            $token = Auth::guard('user_api')->login($user); // generate token
            $user->token = $token;
//            return $user;





            return apiResponse($user,'','200');

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
            return apiResponse('',$validator->errors(),'422');
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
            return response()->json(['data'=>null,'code'=>422,'message'=>$validator->errors()],'422');
        }
        PhoneToken::where(['user_id' => Auth::guard('user_api')->user()->id, 'phone_token' => $request->token])->delete();

        $token = getToken();
        if ($token != null){
            try {
                JWTAuth::setToken($token)->invalidate(); // logout user
                return apiResponse('','logout done');
            }catch(TokenInvalidException $e){
                return apiResponse('','some thing went wrong','422');
            }
        }
        else{
            return apiResponse('','some thing went wrong','422');
        }
    }
    //===========================================
    public function profile(Request $request){
        return apiResponse(Auth::user(),'','422');
    }
    //===========================================
    public function update_profile(Request $request){
        $validator = Validator::make($request->all(),[
            'phone'=>'required|unique:users,phone,'.Auth::user()->id,
//            'email'=>'nullable|unique:users,email,'.Auth::user()->id,
            'name'=>'required',
            'image'=>'nullable',
        ]);
        if ($validator->fails()){
            return apiResponse('',$validator->errors(),'422');
        }
        $user = Auth::user();
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

        return apiResponse($user,'','200');
    }
}
