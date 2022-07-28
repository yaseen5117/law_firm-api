<?php

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
Route::get('/pdf_to_img', 'TestController@pdf_to_img');
Route::get('download_invoice_pdf/{id}', 'Api\InvoiceController@downloadInvoicePdf');
Route::get('download_petition_pdf/{id}', 'Api\PetitionController@downloadPetitionPdf');
Route::get('send_email_before_hearing', 'Api\CronjobController@send_email_before_hearing');

Route::get('convert_word_to_pdf', 'Api\AttachmentController@convertWordToPDF');
Route::get('phpmyinfo', function () {
    phpinfo();
})->name('phpmyinfo');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
