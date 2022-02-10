<?php

use App\Models\Company;
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
    
    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });
    Route::group(['middleware' => 'auth:sanctum','namespace' => 'Api'], function () { 

        Route::resource('customers', CustomerController::class);
        Route::resource('customer_products', CustomerProductController::class);
        Route::resource('servers', ServerController::class);
        Route::resource('support_services', SupportServiceContoller::class);
        Route::resource('customer_servers', CustomerServerController::class);
        Route::resource('customer_support_services', CustomerSupportServiceController::class);
        Route::resource('business_modules', BusinessModuleController::class);
        Route::resource('leads', LeadController::class);
        Route::resource('admins', AdminController::class);
        Route::resource('contact_details', LeadContactDetailController::class);
        Route::resource('rezo_modules', RezoModuleController::class);
        
        Route::get('company', 'CompanyController@index');
        Route::post('company/store', 'CompanyController@store');
        Route::put('company/update/{id}', 'CompanyController@update');
        Route::get('company/{id}', 'CompanyController@show');
        Route::get('customer', 'CustomerController@index');
        Route::post('customer/store', 'CustomerController@store');
        Route::put('customer/update/{id}', 'CustomerController@update');
        Route::get('customer/{id}', 'CustomerController@show');
        Route::get('product', 'ProductController@index');
        Route::post('product/store', 'ProductController@store');
        Route::put('product/update/{id}', 'ProductController@update');
        Route::get('product/{id}', 'ProductController@show');
        Route::post('logout', 'CustomerController@logout');
    });
