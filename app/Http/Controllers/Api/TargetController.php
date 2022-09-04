<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Target;
use App\Models\Wallet;
use App\Models\User;

class TargetController extends Controller
{
    public function targets(){
        $wallet = Wallet::where(['user_id'=>Auth::guard('user_api')->user()->id,'type'=>'purchases'])->first();
        if (!$wallet)
            return apiResponse('','purchase first please');

        $user = User::where('id',Auth::guard('user_api')->user()->id)->with('governorate','city')->first();
        $targets = Target::orderBy('gifts_for')->get();
        foreach ($targets as $target){
            if ($user->points > $target->gifts_for)
                $target->completed = 'yes';
            else
                $target->completed = 'no';
        }
        return apiResponse(['targets'=>$targets,'user'=>$user]);
    }

}
