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

    
    Route::group(['middleware' => 'auth:sanctum','namespace' => 'Api'], function () { 
  
        Route::resource('petitions', 'PetitionController');
        Route::resource('users', 'UserController');
        
        
    });
 
    // Public routes
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('roles', 'Api\UserController@getRoles');
    Route::post('signup', 'Api\UserController@signUp');
    Route::get('clients', 'Api\UserController@getClient');

    Route::resource('attachments', 'Api\AttachmentController');
    
    Route::resource('petition_types', 'Api\PetitionTypeController');
    Route::resource('courts', 'Api\CourtController');
    
    Route::resource('petition_replies', 'Api\PetitionReplyController');

    Route::resource('petition_order_sheets', 'Api\PetitionOrderSheetController');
    Route::POST('petition_order_sheets/by_petition', 'Api\PetitionOrderSheetController@showOrderSheetByPetition');
    //START route for Talbana forms
    Route::resource('petition_talbana', 'Api\PetitionTalbanaController');
    Route::POST('petition_talbana/by_petition', 'Api\PetitionTalbanaController@showTalbanaByPetition');
    //END route for Talbana forms

  //START route for Petition Naqal Form
  Route::resource('petition_naqal_forms', 'Api\NaqalFormController');
  Route::POST('petition_naqal_forms/by_petition', 'Api\NaqalFormController@showNaqalFormByPetition');
  //END route for Petition Naqal Form

    Route::post('petition_reply_details/{id}', 'Api\PetitionReplyController@replyDetail');
    Route::resource('petition_reply_parents', 'Api\PetitionReplyParentController');
    
    //START route for standard page Oral Arguments
    Route::resource('oral_arguments', 'Api\OralArgumentsController');
    Route::post('module_index_details_oral_arguments/{id}', 'Api\OralArgumentsController@oralArgumentDetail');
    //END route for standard page Oral Arguments

    //START route for standard page Case Law
    Route::resource('case_laws', 'Api\CaseLawController');
    Route::post('module_index_details_case_laws/{id}', 'Api\CaseLawController@caseLawDetail');
    //END route for standard page Case Law

    //START route for standard page Extra Document
    Route::resource('extra_documents', 'Api\ExtraDocumentController');
    Route::post('module_index_details_extra_documents/{id}', 'Api\ExtraDocumentController@extraDocsDetail');
    //END route for standard page Extra Document

    //START route for standard page Judgement
    Route::resource('judgements', 'Api\JudgementController');
    Route::post('module_index_details_judgements/{id}', 'Api\JudgementController@judgementDetail');
    //END route for standard page Judgement

    //START route for Synopses forms
    Route::resource('petition_synopsis', 'Api\PetitionSynopsisController');
    Route::POST('petition_synopsis/by_petition', 'Api\PetitionSynopsisController@showSynopsisByPetition');
    //END route for Synopses forms

    //START route for Synopses forms
    Route::resource('general_case_laws', 'Api\GeneralCaseLawController');
    //END route for Synopses forms

    //Route::resource('petition_indexes', 'Api\PetitionIndexController');
    //Route::resource('petitions', 'Api\PetitionController');
    
    Route::resource('petitions_index', 'Api\PetitionIndexController');
    Route::middleware('auth:sanctum')->get('/user', 'Api\UserController@getLoggedInUser');
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
 
// // Public routes
// Route::post('register', 'AuthController@register');
// Route::post('login', 'AuthController@login');
// Route::resource('petitions', 'Api\PetitionController');
// Route::resource('users', 'Api\UserController');
// Route::get('clients', 'Api\UserController@getClient');

// Route::resource('attachments', 'Api\AttachmentController');

// Route::resource('petition_types', 'Api\PetitionTypeController');
// Route::resource('courts', 'Api\CourtController');

// Route::resource('petition_replies', 'Api\PetitionReplyController');

// Route::resource('petition_order_sheets', 'Api\PetitionOrderSheetController');
// Route::POST('petition_order_sheets/by_petition', 'Api\PetitionOrderSheetController@showOrderSheetByPetition');
// //START route for Talbana forms
// Route::resource('petition_talbana', 'Api\PetitionTalbanaController');
// Route::POST('petition_talbana/by_petition', 'Api\PetitionTalbanaController@showTalbanaByPetition');
// //END route for Talbana forms

// //START route for Synopses forms
// Route::resource('petition_synopsis', 'Api\PetitionSynopsisController');
// Route::POST('petition_synopsis/by_petition', 'Api\PetitionSynopsisController@showSynopsisByPetition');
// //END route for Synopses forms

// //START route for Petition Naqal Form
// Route::resource('petition_naqal_forms', 'Api\NaqalFormController');
// Route::POST('petition_naqal_forms/by_petition', 'Api\NaqalFormController@showNaqalFormByPetition');
// //END route for Petition Naqal Form

// Route::post('petition_reply_details/{id}', 'Api\PetitionReplyController@replyDetail');
// Route::resource('petition_reply_parents', 'Api\PetitionReplyParentController');

// //START route for standard page Oral Arguments
// Route::resource('oral_arguments', 'Api\OralArgumentsController');
// Route::post('module_index_details_oral_arguments/{id}', 'Api\OralArgumentsController@oralArgumentDetail');
// //END route for standard page Oral Arguments

// //START route for standard page Case Law
// Route::resource('case_laws', 'Api\CaseLawController');
// Route::post('module_index_details_case_laws/{id}', 'Api\CaseLawController@caseLawDetail');
// //END route for standard page Case Law

// //START route for standard page Extra Document
// Route::resource('extra_documents', 'Api\ExtraDocumentController');
// Route::post('module_index_details_extra_documents/{id}', 'Api\ExtraDocumentController@extraDocsDetail');
// //END route for standard page Extra Document

// //START route for standard page Judgement
// Route::resource('judgements', 'Api\JudgementController');
// Route::post('module_index_details_judgements/{id}', 'Api\JudgementController@judgementDetail');
// //END route for standard page Judgement

// //Route::resource('petition_indexes', 'Api\PetitionIndexController');
// //Route::resource('petitions', 'Api\PetitionController');

// Route::resource('petitions_index', 'Api\PetitionIndexController');
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::group(['middleware' => 'auth:sanctum', 'namespace' => 'Api'], function () {


//     // Route::resource('admins', AdminController::class);  
//     // Route::put('company/update/{id}', 'CompanyController@update');
//     // Route::get('company/{id}', 'CompanyController@show');
//     // Route::get('customer', 'CustomerController@index');
//     // Route::post('customer/store', 'CustomerController@store');
//     // Route::put('customer/update/{id}', 'CustomerController@update');
//     // Route::get('customer/{id}', 'CustomerController@show');
//     // Route::get('product', 'ProductController@index');
//     // Route::post('product/store', 'ProductController@store');
//     // Route::put('product/update/{id}', 'ProductController@update');
//     // Route::get('product/{id}', 'ProductController@show');
//     // Route::post('logout', 'CustomerController@logout');
// });
 
