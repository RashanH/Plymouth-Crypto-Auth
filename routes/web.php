<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KeyController;
use App\Http\Controllers\TestController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('billing', [BillingController::class, 'index'])->middleware('auth')->name('billing');

Route::resource('products', ProductController::class)->middleware('auth');

Route::get('customers/autocomplete',  [CustomerController::class, 'autocomplete'])->middleware('auth')->name('customers/autocomplete');
Route::get('customers/get_details_by_email',  [CustomerController::class, 'get_details_by_email'])->middleware('auth')->name('customers/get_details_by_email');
Route::resource('customers', CustomerController::class)->middleware('auth');


Route::get('/keys/create/{product}', [KeyController::class, 'create']);
Route::resource('keys', KeyController::class)->except(['create'])->middleware('auth');

Route::get('test', [TestController::class, 'index']);