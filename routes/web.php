<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
Route::get('/test_send_document_uploading_email', 'TestController@test_send_document_uploading_email');
Route::get('/test_queue', 'TestController@test_queue');
Route::get('/generate_slugs', 'TestController@generate_slugs');
Route::get('/pdf_to_img', 'TestController@pdf_to_img');
Route::get('download_invoice_pdf/{id}', 'Api\InvoiceController@downloadInvoicePdf');
Route::get('download_petition_pdf/{id}', 'Api\PetitionController@downloadPetitionPdf');
Route::get('fir_reader_result_pdf_download', 'Api\FirController@downloadFirReaderResultAsPdf');
Route::get('download_pending_cases_pdf', 'Api\PetitionController@downloadPendingCase');
Route::get('convert_word_to_pdf', 'Api\AttachmentController@convertWordToPDF');
//Route to Move all files from old to new folder structure.
Route::get('move_index_files/{id}', 'Api\AttachmentController@copyIndexFiles');
Route::get('move_reply_files/{id}', 'Api\AttachmentController@copyReplyFiles');
Route::get('move_order_sheet_files/{id}', 'Api\AttachmentController@copyOrderSheetFiles');
Route::get('move_oral_argument_files/{id}', 'Api\AttachmentController@copyOralArgumentFiles');
Route::get('move_naqal_form_files/{id}', 'Api\AttachmentController@copyNaqalFormFiles');
Route::get('move_talbana_files/{id}', 'Api\AttachmentController@copyTalbanaFiles');
Route::get('move_case_law_files/{id}', 'Api\AttachmentController@copyCaseLawFiles');
Route::get('move_extra_doc_files/{id}', 'Api\AttachmentController@copyExtraDocsFiles');
Route::get('move_synopsis_files/{id}', 'Api\AttachmentController@copySynopsisFiles');
Route::get('move_judgement_files/{id}', 'Api\AttachmentController@copyJudgementFiles');
Route::get('send_client_signup_email', 'Api\UserController@clientEmail');
Route::get('create_petiiton_types_abbreviation', 'Api\PetitionTypeController@createAbbreviation');
//change column type
Route::get('change_db_col_type', function (Request $request) {
    $table = $request->table;
    $column = $request->column;
    $newColumnType = $request->colType;
    changeColumnType($table, $column, $newColumnType);
    return "success";
});

/*ALL CRONJOBS*/
Route::get('send_email_before_hearing', 'Api\CronjobController@send_email_before_hearing');
/*ALL CRONJOBS*/

Route::get('phpmyinfo', function () {
    phpinfo();
})->name('phpmyinfo');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
