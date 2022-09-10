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

        $collection = collect([]);
        $wallet->each(function ($item) use ($collection) {
            $target = $collection->whereBetween('created_at',
                [date('Y-m-d 00:00:00',strtotime($item->created_at)),date('Y-m-d 24:59:59',strtotime($item->created_at))]);
            if ($target->count()==0)
            {
                $collection->push($item);
            }
        });
        $date = [];
        foreach ($collection as $walet){
            $my_wallet = Wallet::where(['user_id'=>Auth::guard('user_api')->user()->id])
                ->whereDate('created_at',date('Y-m-d',strtotime($walet->created_at)))
                ->with('order','user.governorate','user.city')
                ->latest()->get();
            $date[] = ['date'=>date('Y-m-d',strtotime($walet->created_at)),'wallets'=>$my_wallet];

        }

        return apiResponse($date);
    }
}
