<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\NotificationFirebaseTrait;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
use App\Models\OrderDetails;
use App\Http\Traits\ProductTrait;

class HomeController extends Controller
{
    use ProductTrait,NotificationFirebaseTrait;

    public function home(Request $request)
    {
        $data = [];
        //////////////////// slider
//        if ($request->slider_paginate=='on') {
//            $number = $request->slider_page_num??10;
//            $data['sliders'] = Slider::with('product','offer','brand')->paginate($number);
//            $data['sliders'] =  paginateResponse($data['sliders'],'on');
//        }else{
//            $data['sliders'] = Slider::with('product','offer','brand')->get();
//            $data['sliders'] =  paginateResponse($data['sliders']);
//        }
        $data['sliders'] = Slider::with('product', 'offer', 'brand')->get();

        //////////////////// categories
//        if ($request->category_paginate=='on') {
//            $number = $request->category_page_num??10;
//            $data['categories'] = Category::with('categoryBrands.brand')->paginate($number);
//            $data['categories'] =  paginateResponse($data['categories'],'on');
//        }else{
//            $data['categories'] = Category::with('categoryBrands.brand')->get();
//            $data['categories'] =  paginateResponse($data['categories']);
//        }
        $data['categories'] = Category::with('categoryBrands.brand')->get();

        ///////////////////// most sell products

        $products = OrderDetails::where('type', 'product')
            ->whereHas('product')
            ->with('product.category', 'product.brand', 'product.sm_unit', 'product.lg_unit')->get();
        $collection = collect([]);
        $products->each(function ($item) use ($collection) {
            $target = $collection->where('product_id', $item->product_id);
            if ($target->count() == 0) {
                $collection->push($item);
            }
        });

        foreach ($collection as $product) {
            $product->count = OrderDetails::where('product_id', $product->product_id)->count();
        }
        $collection = $collection->sortByDesc("count");

        $arrays = [];
        foreach ($collection as $product) {
            $arrays[] = $product->product;
        }
//        if ($request->product_paginate=='on') {
//            $number = $request->product_page_num??10;
//            $data['products'] = array_slice( $arrays, 0, $number );
//            $data['products'] = ['data'=>$data['products']];
//            $data['products'] =  paginateResponse($data['products'],'on');
//        }else{
//            $data['products']['data'] = $arrays;
//            $data['products'] =  paginateResponse($data['products']);
//        }
        $data['products'] = array_slice($arrays, 0, 10);
        if ($data['products'])
            $data['products'] = $this->get_products_max_sm_amount($data['products']);
        
        return apiResponse($data);

    }

//    //############################################################################
//    public function slider(){
//        $slider = Slider::all();
//        return apiResponse($slider);
//
//    }

    public function sendFCMNotification()
    {
//        $this->sendFCMNotification([])
    }//end fun
}
