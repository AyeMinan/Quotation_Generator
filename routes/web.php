<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\EmailController;


Route::get('/', function () {
    return view('home');
});

Route::get('/quotation', [QuotationController::class, 'index']);
Route::post('/quotation', [QuotationController::class, 'submitForm']);
Route::get('/service', [QuotationController::class, 'service']);
Route::get('/form', [QuotationController::class, 'form']);
Route::get('/websitedevelopment', [QuotationController::class, 'websiteDevelopmentFrom']);
Route::get('/digitalMarketing', [QuotationController::class, 'digitalMarketing']);
Route::get('/seo', [QuotationController::class, 'seo']);
Route::post('/calculate-quotation', [QuotationController::class, 'calculateQuotation']);
Route::get('/review', [QuotationController::class, 'review']);
Route::post('/send-quote', [QuotationController::class, 'sendQuote']);


