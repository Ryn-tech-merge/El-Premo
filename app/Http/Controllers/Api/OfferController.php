<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Offer;

class OfferController extends Controller
{
    public function offers(Request $request){
        $data = Offer::where(function ($query){
                $query->where('amount','>',0)
                    ->orwhere('amount',null);
            })->where(function ($query){
                $query->where('start_date','<=',date('Y-m-d'))
                    ->orwhere('start_date',null);
            })
            ->where(function ($query){
                $query->where('end_date','>=',date('Y-m-d'))
                    ->orwhere('end_date',null);
            })
            ->with('offerProducts.product')
            ->get();

        return apiResponse($data);

    }

    //###############################################################//


}
