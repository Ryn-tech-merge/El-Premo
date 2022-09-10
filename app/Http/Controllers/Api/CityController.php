<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Governorate;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    public function cities(Request $request){
        $validator = Validator::make($request->all(), [ // <---
            'governorate_id' => 'required',
        ]);
        if ($validator->fails()) {
            return apiResponse(null,$validator->errors(),'422');
        }
        $data = City::where('governorate_id',$request->governorate_id)->get();
        return apiResponse($data);
    }

    //####################  end function #########
    public function governorates(){
        $data = Governorate::with('cities')->get();
        return apiResponse($data);
    }
}
