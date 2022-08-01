<?php

use App\Http\Controllers\formController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\MpesaController;
use App\Http\Controllers\QuotationController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/rfq', formController::class);
Route::resource('/quote', QuotationController::class);
Route::resource('/mpesa', MpesaController::class);
Route::resource('/item', ItemsController::class);

