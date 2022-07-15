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

Route::get('test_convert', 'Api\PetitionController@test_convert');

Route::group(['middleware' => 'auth:sanctum', 'role:admin', 'namespace' => 'Api'], function () {
    Route::resource('users', 'UserController');
    Route::resource('petition_hearing', 'PetitionHearingController');
    Route::get('invoices/stats', 'InvoiceController@invoicesStats');
    Route::resource('invoices', 'InvoiceController');

    Route::delete('delete_invoice_expense/{invoice_expense_id}', 'InvoiceController@deleteInvoiceExpense');
    Route::get('invoice_statuses', 'InvoiceController@invoice_statuses');
    Route::get('invoice_templates', 'InvoiceController@invoice_templates');
    Route::post('invoice/mark_as_paid', 'InvoiceController@markAsPaid');
    Route::resource('contracts_and_agreements', 'ContractsAndAgreementController');
    Route::resource('links', 'LinkController');

    Route::get('contract_categories', 'ContractsAndAgreementController@contractCategory');
    Route::resource('settings', 'SettingController');

    Route::get('get_order_sheet_types', 'PetitionOrderSheetController@getOrderSheetTypes');
    Route::get('get_naqal_form_types', 'NaqalFormController@getNaqalFormTypes');
    Route::get('get_talbana_types', 'PetitionTalbanaController@getTalbanaTypes');
    Route::get('get_synopsis_types', 'PetitionSynopsisController@getSynopsisTypes');

    Route::get('clients', 'UserController@getClient');
    Route::get('client_users', 'UserController@getClientUsers');
    Route::get('lawyers', 'UserController@getLawyer');

    //contact request    
    Route::get('get_contact_requests', 'FrontEndController@getContactRequest');

    //opinions
    Route::resource('opinions', 'OpinionController');

    Route::post('delete_selected', 'AttachmentController@deleteSelected');
    Route::resource('module_types', 'PetitionModuleTypeController');
    Route::resource('petition_types', 'PetitionTypeController');
    Route::resource('courts', 'CourtController');

    //START route for General Case Law
    Route::resource('general_case_laws', 'GeneralCaseLawController');
    //END route for General Case Law

    Route::resource('attachments', 'AttachmentController');

    Route::resource('sample_pleadings', 'SamplePleadingController');
});

Route::group(['middleware' => 'auth:sanctum', 'namespace' => 'Api'], function () {

    Route::post('petitions/toggle_archived', 'PetitionController@toggleArchivedStatus');
    Route::resource('petitions', 'PetitionController'); //middleware added in controller __construct()
    Route::resource('petition_replies', 'PetitionReplyController'); //middleware added in controller __construct()

    Route::resource('petition_reply_parents', 'PetitionReplyParentController'); //middleware added in controller __construct()

    //Route::post('invoices/mark_paid', 'InvoiceController@mark_paid'); 
    Route::get('download_pdf/{id}', 'InvoiceController@downloadInvoicePdf');

    //Route::post('delete_additional_email','SettingController@deleteAdditionalEmail');

    Route::post('delete_folder', 'AttachmentController@findOriginalFolder');

    Route::POST('petition_order_sheets/by_petition', 'PetitionOrderSheetController@showOrderSheetByPetition');
    //START route for Talbana forms
    Route::resource('petition_talbana', 'PetitionTalbanaController'); //middleware added in controller __construct()
    Route::POST('petition_talbana/by_petition', 'PetitionTalbanaController@showTalbanaByPetition');
    //END route for Talbana forms

    //START route for Petition Naqal Form
    Route::resource('petition_naqal_forms', 'NaqalFormController'); //middleware added in controller __construct()
    Route::POST('petition_naqal_forms/by_petition', 'NaqalFormController@showNaqalFormByPetition');
    //END route for Petition Naqal Form

    //START route for standard page Oral Arguments
    Route::resource('oral_arguments', 'OralArgumentsController'); //middleware added in controller __construct()
    //END route for standard page Oral Arguments

    //START route for standard page Case Law
    Route::resource('case_laws', 'CaseLawController'); //middleware added in controller __construct()
    //END route for standard page Case Law

    //START route for standard page Extra Document
    Route::resource('extra_documents', 'ExtraDocumentController'); //middleware added in controller __construct()
    //END route for standard page Extra Document

    //START route for standard page Judgement
    Route::resource('judgements', 'JudgementController'); //middleware added in controller __construct()
    //END route for standard page Judgement

    //START route for Synopses forms
    Route::resource('petition_synopsis', 'PetitionSynopsisController'); //middleware added in controller __construct()
    Route::POST('petition_synopsis/by_petition', 'PetitionSynopsisController@showSynopsisByPetition');
    //END route for Synopses forms

    Route::resource('petitions_index', 'PetitionIndexController'); //middleware added in controller __construct()
});

//contact request to save
Route::post('contact_requests', 'Api\FrontEndController@contactRequest'); //middleware added in controller __construct() for this route only

Route::post('delete_contact_request/{id}', 'Api\FrontEndController@deleteContactRequest');
Route::post('roles', 'Api\UserController@getRoles');
Route::post('module_index_details_judgements/{id}', 'Api\JudgementController@judgementDetail');
Route::post('module_index_details_extra_documents/{id}', 'Api\ExtraDocumentController@extraDocsDetail');
Route::post('module_index_details_case_laws/{id}', 'Api\CaseLawController@caseLawDetail');

Route::post('module_index_details_oral_arguments/{id}', 'Api\OralArgumentsController@oralArgumentDetail');
Route::resource('petition_order_sheets', 'Api\PetitionOrderSheetController'); //middleware added in controller __construct()
Route::post('petition_reply_details/{id}', 'Api\PetitionReplyController@replyDetail');
// Public routes
Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::post('signup', 'Api\UserController@signUp');
Route::get('settings', 'Api\SettingController@index');

Route::middleware('auth:sanctum')->get('/user', 'Api\UserController@getLoggedInUser');
Route::group(['middleware' => 'auth:sanctum', 'namespace' => 'Api'], function () {


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
