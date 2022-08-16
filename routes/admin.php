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

        ################################### categories ##########################################
        Route::resource('categories','CategoryController');
        Route::resource('category_images','CategoryImagesController');
//        Route::get('category_images_edit','CategoryImagesController@edit')->name('category_images_edit');

        ################################### sub_categories ##########################################
        Route::resource('sub_categories','SubCategoryController');

        ################################### contacts ##########################################
        Route::resource('contacts','ContactController');

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

        ################################### orders ##########################################
        Route::resource('orders','OrderController');


    });//end Middleware Admin

//    Route::fallback(function () {
//        return redirect('admin/home');
//    });

});//end Prefix
