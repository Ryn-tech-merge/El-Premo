<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contact_us(Request $request){
        $validator = Validator::make($request->all(),[
            'phone'=>'required',
            'mail'=>'required',
            'subject'=>'required',
            'message'=>'required',
        ]);
        if ($validator->fails()){
            return apiResponse('',$validator->errors(),'422');
        }
        $data = $request->only('phone','mail','subject','message');
        $contact = Contact::create($data);
        return apiResponse($contact);

    }
}
