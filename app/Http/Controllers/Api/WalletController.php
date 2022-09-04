<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wallet;

class WalletController extends Controller
{
    public function wallet(){
        $wallet = Wallet::where(['user_id'=>Auth::guard('user_api')->user()->id])
            ->with('order','user.governorate','user.city')
            ->latest()->get();
        return apiResponse($wallet);
    }
}
