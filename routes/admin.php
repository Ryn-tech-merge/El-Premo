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
        Route::post('multi_delete_admins','AdminController@multiDelete')->name('admins.multiDelete');

        ################################### users ##########################################
        Route::resource('users','UserController');
        Route::get('block_user/{id}','UserController@block')->name('users.block');
        Route::get('change_user_active/{id}','UserController@change_active')->name('change_user_active');
        Route::get('user_profile/{id}','UserController@user_profile')->name('user_profile');
        Route::get('getGovernorateCities','UserController@getGovernorateCities')->name('getGovernorateCities');
        Route::post('multi_delete_users','UserController@multiDelete')->name('users.multiDelete');

        ################################### categories ##########################################
        Route::resource('categories','CategoryController');
        Route::post('multi_delete_categories','CategoryController@multiDelete')->name('categories.multiDelete');
        Route::resource('category_images','CategoryImagesController');
//        Route::get('category_images_edit','CategoryImagesController@edit')->name('category_images_edit');

        ################################### sub_categories ##########################################
        Route::resource('sub_categories','SubCategoryController');
        Route::post('multi_delete_sub_categories','SubCategoryController@multiDelete')->name('sub_categories.multiDelete');

        ################################### contacts ##########################################
        Route::resource('contacts','ContactController');
        Route::get('replay_contact/{id}','ContactController@replay')->name('replay_contact');
        Route::post('post_replay_contact','ContactController@post_replay')->name('post_replay_contact');
        Route::post('multi_delete_contacts','ContactController@multiDelete')->name('contacts.multiDelete');

        ################################### settings ##########################################
        Route::resource('settings','SettingController');

        ################################### sliders ##########################################
        Route::resource('sliders','SliderController');
        Route::post('multi_delete_sliders','SliderController@multiDelete')->name('sliders.multiDelete');
        ################################### units ##########################################
        Route::resource('units','UnitController');
        Route::post('multi_delete_units','UnitController@multiDelete')->name('units.multiDelete');

        ################################### products ##########################################
        Route::resource('products','ProductController');
        Route::get('get_category_brands','ProductController@get_category_brands')->name('get_category_brands');
        Route::get('edit_products_amount','ProductController@edit_products_amount')->name('edit_products_amount');
        Route::post('update_products_amount','ProductController@update_products_amount')->name('update_products_amount');
        Route::post('multi_delete_products','ProductController@multiDelete')->name('products.multiDelete');

        ################################### offers ##########################################
        Route::resource('offers','OfferController');
        Route::get('get_product_units','OfferController@get_product_units')->name('get_product_units');
        Route::post('multi_delete_offers','OfferController@multiDelete')->name('offers.multiDelete');

        ################################### orders ##########################################
        Route::resource('orders','OrderController');
        Route::get('change_order_status/{id}','OrderController@change_order_status')->name('change_order_status');
        Route::post('update_order_status','OrderController@update_order_status')->name('update_order_status');
        Route::get('order_details/{id}','OrderController@order_details')->name('order_details');
        Route::post('multi_delete_orders','OrderController@multiDelete')->name('orders.multiDelete');

        ################################### notifications ##########################################
        Route::resource('notifications','NotificationController');

        ################################### gift_for ##########################################
        Route::resource('targets','TargetController');
        Route::post('multi_delete_targets','TargetController@multiDelete')->name('targets.multiDelete');

        ################################### coupons ##########################################
        Route::resource('coupons','CouponController');
        Route::post('multi_delete_coupons','CouponController@multiDelete')->name('coupons.multiDelete');


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
