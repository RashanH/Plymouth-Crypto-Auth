<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KeyController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\APIController;
use App\Http\Controllers\DashboardController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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

Route::get('dashboard', [DashboardController::class, 'index'])->middleware(['auth:sanctum', 'verified'])->name('dashboard');

Route::get('billing', [BillingController::class, 'index'])->middleware(['auth', 'verified'])->name('billing');

Route::resource('products', ProductController::class)->middleware(['auth', 'verified']);

Route::get('customers/autocomplete',  [CustomerController::class, 'autocomplete'])->middleware(['auth', 'verified'])->name('customers/autocomplete');
Route::get('customers/get_details_by_email',  [CustomerController::class, 'get_details_by_email'])->middleware(['auth', 'verified'])->name('customers/get_details_by_email');
Route::resource('customers', CustomerController::class)->middleware(['auth', 'verified']);

Route::get('/keys/create/{product}', [KeyController::class, 'create'])->middleware(['auth', 'verified']);
Route::get('/keys/generate_serial', [KeyController::class, 'generate_serial'])->middleware(['auth', 'verified']);
Route::resource('keys', KeyController::class)->except(['create'])->middleware(['auth', 'verified']);

//Route::get('devices', [DeviceController::class, 'index'])->middleware('auth');
Route::resource('devices', DeviceController::class)->except(['index', 'create', 'store', 'show', 'edit', 'update'])->middleware(['auth', 'verified']);

Route::post('api/verify', [APIController::class, 'verify'])->middleware('throttle:15,1');
Route::post('api/register', [APIController::class, 'register'])->middleware('throttle:15,1');
Route::post('api/unsubscribe', [APIController::class, 'unsubscribe'])->middleware('throttle:15,1');

Route::get('pricing', function () { return view('pricing'); });
Route::get('faq', function () { return view('faq'); });
Route::get('contact', function () { return view('contact'); });
Route::post('contact', [DashboardController::class, 'contact'])->name('contact');

Route::get('docs', function () { return view('docs.index'); });
Route::get('docs/csharp', function () { return view('docs.csharp'); });

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');