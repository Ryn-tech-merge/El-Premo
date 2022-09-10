<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Events\NewOrder;
// use App\Events\MyEvent;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* ---------------------- Auth -------------------*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('cities','CityController@cities');
Route::get('governorates','CityController@governorates');
Route::post('login','AuthController@login');
Route::post('register','AuthController@register');
/* ---------------------- home -------------------*/
Route::get('home','HomeController@home');
//Route::get('slider','HomeController@slider');

/* ---------------------- categories -------------------*/
Route::get('one_category','CategoryController@one_category');
Route::get('one_product','CategoryController@one_product');
Route::get('product_search','CategoryController@product_search');

/* ---------------------- offers -------------------*/
Route::get('offers','OfferController@offers');
Route::get('one_offer','OfferController@one_offer');

/* ---------------------- contact -------------------*/
Route::post('contact_us','ContactController@contact_us');
/* ---------------------- accept_order -------------------*/
Route::get('accept_order_schedule','OrderController@accept_order_schedule');
/* ---------------------- setting -------------------*/
Route::get('setting','SettingController@setting');


Route::group(['middleware'=>'all_guards:user_api'],function(){
    Route::post('insert_token','AuthController@insert_token');
    Route::post('logout','AuthController@logout');
    Route::get('profile','AuthController@profile');
    Route::post('update_profile','AuthController@update_profile');

    /* ---------------------- notifications -------------------*/
    Route::get('notifications','NotificationController@notifications');
    /* ---------------------- coupon -------------------*/
    Route::get('coupon','CouponController@coupon');
    Route::get('current_coupons','CouponController@current_coupons');
    Route::get('previous_coupons','CouponController@previous_coupons');

    /* ---------------------- orders -------------------*/
    Route::get('waiting_order_count','OrderController@waiting_order_count');
    Route::post('store_order','OrderController@store_order');
    Route::post('update_order','OrderController@update_order');
    Route::get('current_orders','OrderController@current_orders');
    Route::get('previous_orders','OrderController@previous_orders');
    Route::get('order_details','OrderController@order_details');
    Route::post('cancel_order','OrderController@cancel_order');
//    Route::get('order_details_products','OrderController@order_details_products');

    /* ---------------------- targets -------------------*/
    Route::get('targets','TargetController@targets');
    /* ---------------------- wallet -------------------*/
    Route::get('wallet','WalletController@wallet');


    /* ---------------------- cart -------------------*/
    Route::get('get_cart','CartController@get_cart');
    Route::post('add_cart','CartController@add_cart');
    Route::post('update_cart','CartController@update_cart');
    Route::post('delete_cart','CartController@delete_cart');


});




