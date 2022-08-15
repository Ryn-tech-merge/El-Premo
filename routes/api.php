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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* ---------------------- Splach -------------------*/
Route::post('/get_data','SplachScreenController@get_data');
Route::post('/get_all_categories_nationalities',
'SplachScreenController@get_all_categories_nationalities');
Route::post('/get_freelance_data','SplachScreenController@get_freelance_data');

/* ---------------------- users -------------------*/

Route::post('/create_user','UserController@create');
Route::post('/user_login','UserController@user_login');
Route::post('/change_pass','UserController@change_pass');
Route::post('/get_user','UserController@get_user');
Route::post('/get_user_id','UserController@get_user_id');
Route::post('/delete_user','UserController@delete_user');
Route::post('/edit_profile','UserController@edit_profile');
Route::post('/change_pass','UserController@change_pass');
Route::post('/change_password','UserController@change_password');
Route::post('/update_image_user','UserController@update_image_user');
Route::post('/update_wallet','UserController@update_wallet');
Route::post('/update_user_data_token','UserController@update_user_data_token');

/* ---------------------- category -------------------*/

Route::post('/get_categories/{pageIndex}','CategoryController@get_categories');
Route::post('/create_category','CategoryController@create_category');
Route::get('/get_all_categories','CategoryController@get_all_categories');
Route::post('/search_cat','CategoryController@search_cat');

/* ---------------------- Sub Category -------------------*/

Route::post('/create_sub_category','SubCategoryController@create_sub_category');
Route::post('/sub_category_data','SubCategoryController@sub_category_data');

/* ---------------------- banners -------------------*/

Route::post('/create_banar','BanarController@create_banar');

/* ---------------------- banners -------------------*/

Route::post('/create_pop','PopController@create_pop');

/* ---------------------- area -------------------*/

Route::post('/create_area','AreaController@create_area');
Route::post('/get_all_area','AreaController@get_all_area');

/* ---------------------- address -------------------*/

Route::post('/create_address','AddressController@create_address');
Route::post('/edit_address','AddressController@edit_address');
Route::post('/delete_address','AddressController@delete_address');
Route::post('/get_address/{pageIndex}','AddressController@get_address');

/* ---------------------- notification -------------------*/

Route::post('/create_notification','NotificationController@create_notification');
Route::post('/get_notification/{pageIndex}','NotificationController@get_notification');

/* ---------------------- order -------------------*/

Route::post('/create_order','OrderController@create_order');
Route::post('/accept_order','OrderController@accept_order');
Route::post('/rate_order','OrderController@rate_order');
Route::post('/re_order','OrderController@re_order');
Route::post('/get_orders_freelance/{pageIndex}','OrderController@get_orders_freelance');
Route::post('/get_orders_freelance_filter/{pageIndex}',
'OrderController@get_orders_freelance_filter');
Route::post('/get_orders/{pageIndex}','OrderController@get_orders');
Route::post('/get_order','OrderController@get_order');
Route::post('/finish_order','OrderController@finish_order');
Route::post('/cancel_order','OrderController@cancel_order');
Route::post('/done_order','OrderController@done_order');
Route::post('/send_accept','OrderController@send_accept');
Route::post('/cancel_accept','OrderController@cancel_accept');
Route::post('/update_price','OrderController@update_price');
Route::post('/update_show','OrderController@update_show');
Route::post('/set_coupon_com','OrderController@set_coupon_com');
Route::post('/get_orders_chat','OrderController@get_orders_chat');
Route::post('/get_orders_chat_free','OrderController@get_orders_chat_free');

/* ---------------------- Special -------------------*/

Route::post('/create_special','SpecialController@create_special');
Route::post('/special_data','SpecialController@special_data');

/* ---------------------- coupon -------------------*/

Route::post('/create_coupon','CouponController@create_coupon');
Route::post('/set_coupon','CouponController@set_coupon');

/* ---------------------- area -------------------*/

Route::post('/create_complain','ComplainController@create_complain');

/* ---------------------- freelance -------------------*/

Route::post('/create_free','FreelanceController@create_free');
Route::post('/free_login','FreelanceController@free_login');
Route::post('/change_pass_free','FreelanceController@change_pass_free');
Route::post('/change_password_free','FreelanceController@change_password_free');
Route::post('/update_image_free','FreelanceController@update_image_free');
Route::post('/update_free_data','FreelanceController@update_free_data');
Route::post('/update_free_data_token','FreelanceController@update_free_data_token');


/* ---------------------- offer -------------------*/

Route::post('/create_offer','OfferController@create_offer');
Route::post('/get_offer_id','OfferController@get_offer_id');
Route::post('/get_offer/{page}','OfferController@get_offer');
Route::post('/cancel_offer','OfferController@cancel_offer');

/* ---------------------- info -------------------*/

Route::get('/get_info/{type}','InfoController@get_info');
Route::get('/get_name','InfoController@get_name');
Route::get('/get_about_dom','InfoController@get_about_dom');

/* ---------------------- nationality -------------------*/

Route::post('/create_nationality','NationalityController@create_nationality');
Route::post('/delete_nationality','NationalityController@delete_nationality');
Route::get('/get_nationalities','NationalityController@get_nationalities');

// api for chat
Route::get('/get_chat/{order_id}','ChatController@get_chat');
Route::post('/create_message','ChatController@create_message');
Route::post('/start_message','ChatController@start_message');
Route::post('/close_message','ChatController@close_message');
Route::post('/get_count_order','ChatController@get_count_order');


Route::post('/create_job', 'JopController@create_job');

/* ---------------------- wallet -------------------*/

Route::post('/get_wallet/{page}', 'WalletController@get_wallet');
Route::get('/test_create', 'ContactController@create');