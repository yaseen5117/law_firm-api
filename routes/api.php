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

//ADMIN AND STUDENT ROUTES
Route::group(['middleware' => ['auth:sanctum', 'role:admin|student|lawyer'], 'namespace' => 'Api'], function () {
});

//ADMIN,STAFF LAWYER, STUDENT ROUTES
Route::group(['middleware' => ['auth:sanctum', 'role:admin|lawyer|student|staff'], 'namespace' => 'Api'], function () {
    Route::resource('contracts_and_agreements', 'ContractsAndAgreementController');
    Route::get('contract_categories', 'ContractsAndAgreementController@contractCategory');

    Route::resource('sample_pleadings', 'SamplePleadingController');
    Route::post('petition_reply_details/{id}', 'PetitionReplyController@replyDetail');

    //START route for General Case Law
    Route::resource('general_case_laws', 'GeneralCaseLawController');
    //END route for General Case Law
});

//ADMIN,STAFF AND LAWYER ROUTES
Route::group(['middleware' => ['auth:sanctum', 'role:admin|lawyer|staff'], 'namespace' => 'Api'], function () {
    Route::resource('petition_hearing', 'PetitionHearingController');
    //opinions
    Route::resource('opinions', 'OpinionController');

    Route::get('client_users', 'UserController@getClientUsers');

    Route::resource('links', 'LinkController');
 
    //route for FIR
    Route::resource('fir_sections', 'FirController');
    Route::get('lawyers', 'UserController@getLawyer');
    Route::resource('petition_types', 'PetitionTypeController');
    Route::get('clients', 'UserController@getClient');
    Route::resource('attachments', 'AttachmentController');
    Route::post('delete_selected', 'AttachmentController@deleteSelected');
    Route::get('get_order_sheet_types', 'PetitionOrderSheetController@getOrderSheetTypes');
    Route::get('get_naqal_form_types', 'NaqalFormController@getNaqalFormTypes');
    Route::get('get_talbana_types', 'PetitionTalbanaController@getTalbanaTypes');
    Route::get('get_synopsis_types', 'PetitionSynopsisController@getSynopsisTypes');
});

//ADMIN,STAFF ROUTES
Route::group(['middleware' => ['auth:sanctum', 'role:admin|staff'], 'namespace' => 'Api'], function () {

    Route::get('invoices/stats', 'InvoiceController@invoicesStats');
    Route::resource('invoices', 'InvoiceController');

    Route::delete('delete_invoice_expense/{invoice_expense_id}', 'InvoiceController@deleteInvoiceExpense');
    Route::get('invoice_statuses', 'InvoiceController@invoice_statuses');
    Route::get('invoice_templates', 'InvoiceController@invoice_templates');
    Route::post('invoice/mark_as_paid', 'InvoiceController@markAsPaid');
    Route::delete('invoice/delete_payment/{payment_id}', 'InvoiceController@deleteInvoicePayment');

    Route::resource('settings', 'Api\SettingController');



    //contact request    
    Route::get('get_contact_requests', 'FrontEndController@getContactRequest');

    Route::resource('module_types', 'PetitionModuleTypeController');

    Route::get('get_court_names', 'PetitionTypeController@getCourtsName');

    Route::resource('companies', 'CompanyController');
    Route::post('approve_or_block', 'UserController@approveOrBlock');
});

//ROUTES FOR LOGGED IN USER
Route::group(['middleware' => 'auth:sanctum', 'namespace' => 'Api'], function () {

    Route::resource('users', 'UserController');

    Route::post('petitions_index/update_display_order', 'PetitionIndexController@update_display_order');
    Route::post('petitions/toggle_archived', 'PetitionController@toggleArchivedStatus');
    Route::resource('petitions', 'PetitionController'); //middleware added in controller __construct()
    Route::post('insert_pending_tag', 'PetitionController@insertPendingTag');
    Route::post('remove_pending_tag', 'PetitionController@insertPendingTag');
    Route::get('get_pending_cases', 'PetitionController@getPendingCase');
    Route::get('get_petition', 'PetitionController@getPetition');
    Route::get('get_lawyer_total_petitions', 'PetitionController@getLawyerTotalPetitions');

    Route::resource('petition_replies', 'PetitionReplyController'); //middleware added in controller __construct()
    Route::post('petition_replies/update_display_order', 'PetitionReplyController@update_display_order');

    Route::resource('petition_reply_parents', 'PetitionReplyParentController'); //middleware added in controller __construct()
    Route::post('petition_reply_parents/update_display_order', 'PetitionReplyParentController@update_display_order');
    //Route::post('invoices/mark_paid', 'InvoiceController@mark_paid'); 
    Route::get('download_pdf/{id}', 'InvoiceController@downloadInvoicePdf');

    //Route::post('delete_additional_email','SettingController@deleteAdditionalEmail');

    Route::post('delete_folder', 'AttachmentController@findOriginalFolder');

    Route::resource('courts', 'CourtController');

    Route::POST('get_next_hearing_ordersheet', 'PetitionOrderSheetController@getNextHearingOrderSheet');
    Route::POST('add_hearing_date', 'PetitionOrderSheetController@addNextHearingDateToOrderSheet');
    Route::POST('remove_hearing_date', 'PetitionOrderSheetController@removeNextHearingDate');

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
    Route::post('standard_index_data/update_display_order', 'OralArgumentsController@update_display_order');
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

    Route::post('delete_contact_request/{id}', 'FrontEndController@deleteContactRequest');
    Route::post('module_index_details_judgements/{id}', 'JudgementController@judgementDetail');
    Route::post('module_index_details_extra_documents/{id}', 'ExtraDocumentController@extraDocsDetail');
    Route::post('module_index_details_case_laws/{id}', 'CaseLawController@caseLawDetail');

    Route::post('module_index_details_oral_arguments/{id}', 'OralArgumentsController@oralArgumentDetail');
    Route::resource('petition_order_sheets', 'PetitionOrderSheetController'); //middleware added in controller __construct()
    Route::POST('petition_order_sheets/by_petition', 'PetitionOrderSheetController@showOrderSheetByPetition');

    //upload user image route 
    Route::post('upload_user_image', 'UserController@uploadImage');
    Route::post('get_user_meeting', 'UserVideoMeetingController@getUserMeeting');
    Route::post('create_new_meeting', 'UserVideoMeetingController@createMeeting');
});

//contact request to save
Route::post('roles', 'Api\UserController@getRoles');
Route::post('contact_requests', 'Api\FrontEndController@contactRequest'); //middleware added in controller __construct() for this route only


// Public routes
Route::get('settings', 'SettingController@index');
Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::post('signup', 'Api\UserController@signUp');

//Limitation Calculator Public route    
 Route::post('limitation_calculator_case_questions', 'Api\LimitationCalculatorController@getLimitationCalculatorCaseQuestions');
 Route::post('limitation_calculator_case_sub_answers', 'Api\LimitationCalculatorController@getlimitationCalculatorCaseSubAnswers');

Route::get('limitation_calculator_cases', 'Api\LimitationCalculatorController@getLimitationCalculatorCases');


Route::get('get_html_content', 'Api\CmsPageController@index');
//Fir reader public routes
Route::resource('statutes', 'Api\StatuteController'); //middleware added in controller __construct()
Route::post('section_search_results', 'Api\FirController@sectionSearchResult');
Route::post('download_fir_reader_result_pdf', 'Api\FirController@downloadFirReaderResultAsPdf');


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