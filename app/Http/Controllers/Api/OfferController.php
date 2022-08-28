<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Offer;

class OfferController extends Controller
{
    public function offers(Request $request){
        $data = Offer::where('is_available','yes')
            ->where(function ($query){
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
            ->with('offerProducts.unit','offerProducts.product.category','offerProducts.product.brand','offerProducts.product.sm_unit','offerProducts.product.lg_unit')
            ->latest()->get();

        return apiResponse($data);

    }

    //###############################################################//
    public function one_offer(Request $request){
        $validator = Validator::make($request->all(),[
            'id'=>'required',
        ]);
        if ($validator->fails()){
            return apiResponse('',$validator->errors(),'422');
        }
        $data = Offer::where('id',$request->id)
            ->with('offerProducts.unit','offerProducts.product.category','offerProducts.product.brand','offerProducts.product.sm_unit','offerProducts.product.lg_unit')
            ->first();

        return apiResponse($data);
    }


}
