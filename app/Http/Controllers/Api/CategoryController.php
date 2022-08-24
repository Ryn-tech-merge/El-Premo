<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function one_category(Request $request){
        $validator = Validator::make($request->all(),[
            'id'=>'required',
        ]);
        if ($validator->fails()){
            return apiResponse('',$validator->errors(),'422');
        }
        $data = Category::where('id',$request->id)->with('categoryBrands.brand')->first();

        $data['products'] = [];
        if ($request->brand_id && $request->brand_id != null)
            $data['products'] = Product::where(['category_id'=>$request->id,'brand_id'=>$request->brand_id])
            ->with('category','brand','sm_unit','lg_unit');
        else
            $data['products'] = Product::where('category_id',$request->id)
                ->with('category','brand','sm_unit','lg_unit');

        if ($request->paginate=='on') {
            $number = $request->page_num??10;
            $data['products'] = $data['products']->paginate($number);
            $data['products'] =  paginateResponse($data['products'],'on');
        }else{
            $data['products'] = $data['products']->get();
            $data['products'] =  paginateResponse($data['products']);
        }

        return apiResponse($data);

    }

    //###############################################################//
    public function one_product(Request $request){
        $validator = Validator::make($request->all(),[
            'id'=>'required',
        ]);
        if ($validator->fails()){
            return apiResponse('',$validator->errors(),'422');
        }
        $data = Product::where('id',$request->id)->with('category','brand','sm_unit','lg_unit')->first();

        $data['other_products'] = Product::where(['category_id'=>$data->category_id,'brand_id'=>$data->brand_id])
            ->where('id','!=',$request->id)
            ->with('category','brand','sm_unit','lg_unit')->limit(8)->get();

//        if ($request->paginate=='on') {
//            $number = $request->page_num??10;
//            $data['other_products'] = $data['other_products']->paginate($number);
//            $data['other_products'] =  paginateResponse($data['other_products'],'on');
//        }else{
//            $data['other_products'] = $data['other_products']->get();
//            $data['other_products'] =  paginateResponse($data['other_products']);
//        }

        return apiResponse($data);

    }

    //###############################################################//
}
