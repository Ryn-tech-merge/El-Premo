<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'admin'], function () {
    Route::get('login','AuthController@index')->name('login');
    Route::post('post_login','AuthController@login')->name('post_login');


    //******* after login *******
    Route::group(['middleware' => 'admin'], function () {

        Route::get('logout','AuthController@logout')->name('logout');

        Route::get('/',function (){
            return redirect('admin/home');
        })->name('/');
        Route::get('home','HomeController@index')->name('home');

        ################################### Profile ##########################################
        Route::get('profile','AdminController@profile')->name('profile');
        Route::post('update-profile','AdminController@update_profile')->name('profile.update');


        ################################### Admins ##########################################
        Route::resource('admins','AdminController');

        ################################### users ##########################################
        Route::resource('users','UserController');
        Route::get('block_user/{id}','UserController@block')->name('users.block');
        Route::get('change_user_active/{id}','UserController@change_active')->name('change_user_active');
        Route::get('user_profile/{id}','UserController@user_profile')->name('user_profile');
        Route::get('getGovernorateCities','UserController@getGovernorateCities')->name('getGovernorateCities');

        ################################### categories ##########################################
        Route::resource('categories','CategoryController');
        Route::resource('category_images','CategoryImagesController');
//        Route::get('category_images_edit','CategoryImagesController@edit')->name('category_images_edit');

        ################################### sub_categories ##########################################
        Route::resource('sub_categories','SubCategoryController');

        ################################### contacts ##########################################
        Route::resource('contacts','ContactController');
        Route::get('replay_contact/{id}','ContactController@replay')->name('replay_contact');
        Route::post('post_replay_contact','ContactController@post_replay')->name('post_replay_contact');

        ################################### settings ##########################################
        Route::resource('settings','SettingController');

        ################################### sliders ##########################################
        Route::resource('sliders','SliderController');
        ################################### units ##########################################
        Route::resource('units','UnitController');

        ################################### products ##########################################
        Route::resource('products','ProductController');
        Route::get('get_category_brands','ProductController@get_category_brands')->name('get_category_brands');

        ################################### offers ##########################################
        Route::resource('offers','OfferController');
        Route::get('get_product_units','OfferController@get_product_units')->name('get_product_units');

        ################################### orders ##########################################
        Route::resource('orders','OrderController');
        Route::get('change_order_status/{id}','OrderController@change_order_status')->name('change_order_status');
        Route::post('update_order_status','OrderController@update_order_status')->name('update_order_status');
        Route::get('order_details/{id}','OrderController@order_details')->name('order_details');

        ################################### notifications ##########################################
        Route::resource('notifications','NotificationController');

        ################################### gift_for ##########################################
        Route::resource('targets','TargetController');

        ################################### coupons ##########################################
        Route::resource('coupons','CouponController');


    });//end Middleware Admin

    Route::fallback(function () {
        return redirect('admin/home');
    });
    Route::get('/clear-cache', function() {
        Artisan::call('cache:clear');
        Artisan::call('optimize:clear');
        return '<h1> cache cleared</h1>';
    });
});//end Prefix
