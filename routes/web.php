<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\TestController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\SubscriptionController;
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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


Route::get('test', [TestController::class, 'show'])->middleware('auth');

//Route::get('billing', [BillingController::class, 'show'])->middleware('auth')->name('billing');



Route::get('/billing-portal', function (Request $request) {
    return $request->user()->redirectToBillingPortal(route('billing'));
});

Route::group(['middleware' => 'auth'], function() {
    //Route::get('/home', 'HomeController@index')->name('home');
   
    Route::get('/plans', [PlanController::class, 'index'])->name('plans.index');
    Route::get('/plan/{plan}', [PlanController::class, 'show'])->name('plans.show');
    
    Route::post('/subscription', [SubscriptionController::class, 'create'])->name('subscription.create');

    //Routes for create Plan
   
    Route::get('create/plan', [SubscriptionController::class, 'createPlan'])->name('create.plan');
    Route::post('store/plan',  [SubscriptionController::class, 'storePlan'])->name('store.plan');
});