<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\EmailController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [QuotationController::class, 'index']);
Route::post('/quotation', [QuotationController::class, 'store']);

Route::get('/sendMail', [QuotationController::class, 'sendNotifyMail']);

