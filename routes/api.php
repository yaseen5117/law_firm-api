<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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


    // Public routes
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::resource('petitions', 'Api\PetitionController');
    Route::resource('users', 'Api\UserController');
    Route::get('clients', 'Api\UserController@getClient');

    Route::resource('uploads', 'Api\AttachmentController');
    
    Route::resource('petition_types', 'Api\PetitionTypeController');
    Route::resource('courts', 'Api\CourtController');
    
    //Route::resource('petition_indexes', 'Api\PetitionIndexController');
    //Route::resource('petitions', 'Api\PetitionController');
    
    Route::resource('petitions_index', 'Api\PetitionIndexController');
    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });
    Route::group(['middleware' => 'auth:sanctum','namespace' => 'Api'], function () { 
  
        
        // Route::resource('admins', AdminController::class);  
        // Route::put('company/update/{id}', 'CompanyController@update');
        // Route::get('company/{id}', 'CompanyController@show');
        // Route::get('customer', 'CustomerController@index');
        // Route::post('customer/store', 'CustomerController@store');
        // Route::put('customer/update/{id}', 'CustomerController@update');
        // Route::get('customer/{id}', 'CustomerController@show');
        // Route::get('product', 'ProductController@index');
        // Route::post('product/store', 'ProductController@store');
        // Route::put('product/update/{id}', 'ProductController@update');
        // Route::get('product/{id}', 'ProductController@show');
        // Route::post('logout', 'CustomerController@logout');
    });
