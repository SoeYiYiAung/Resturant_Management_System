<?php

// use App\Http\Controllers\AttendanceController;

// use App\Http\Controllers\AttendanceController;
// use App\Http\Controllers\LeaveController;

use App\Http\Controllers\AvailableFoodController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\TempController;
use App\Models\AvailableFood;
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

Route::group(['prefix' => 'resturant-pos'], function () {
    Route::resource('available_food', AvailableFoodController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('temp', TempController::class);
    
    Route::resource('order', OrderController::class);
    Route::get('delete', [DeleteController::class, 'allDelete'])->name('delete.allDelete');

    Route::resource('sale', SaleController::class);
    // Route::get('/chart/{year}', [SaleController::class, 'index'])->name('sales.chart');
    Route::resource('report', ReportController::class);
    Route::resource('promotion', PromotionController::class);

});


Route::group(['prefix' => 'resturant-pos', 'namespace' => 'App\Http\Controllers'], function () {

    Route::get('home','HomeController@home')->name('hmm-group.home');
    Route::get('dashboard', 'HomeController@dashboard')->name('hmm-group.dashboard');
    Route::get('hmm', 'HomeController@hmm')->name('hmm-group.hmm');
    Route::get('attendance', 'HomeController@attendance')->name('hmm-group.attendance');
    Route::get('exam', 'HomeController@exam')->name('hmm-group.exam');
    Route::get('payment', 'HomeController@payment')->name('hmm-group.payment');
    Route::get('setting', 'HomeController@setting')->name('hmm-group.setting');

    
});
