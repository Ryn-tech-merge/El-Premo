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

Route::post('login','AuthController@login');
Route::post('register','AuthController@register');
/* ---------------------- home -------------------*/
Route::get('home','HomeController@home');

/* ---------------------- categories -------------------*/
Route::get('one_category','CategoryController@one_category');
Route::get('one_product','CategoryController@one_product');

/* ---------------------- offers -------------------*/
Route::get('offers','OfferController@offers');


Route::group(['middleware'=>'all_guards:user_api'],function(){
    Route::post('logout','AuthController@logout');
    Route::get('profile','AuthController@profile');
    Route::post('update_profile','AuthController@update_profile');



});




