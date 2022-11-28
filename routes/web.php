<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\index\IndexController;

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

Route::get('/', function () { return redirect()->route("index"); });

Route::get('/logout', [IndexController::class,'logout']);

Route::prefix('/')->group(function () {
    Route::get('index', [IndexController::class,'masterIndex'])->name("index");
    Route::post('checkLogin', [IndexController::class,'checkLogin']);
    Route::get('checkRegister', [IndexController::class,'checkRegister']);
});

Route::prefix('admin')->group(function () {
    Route::get('dashboard', [AdminController::class,"masterDashboard"]);
    Route::get('customer', [AdminController::class,"masterCustomer"]);
    Route::get('restaurant', [AdminController::class,"masterRestaurant"]);
    Route::get('settings', [AdminController::class,"masterSettings"]);
});

Route::prefix('customer')->group(function () {
    Route::get('dashboard', [AdminController::class,"masterDashboard"]);
    Route::get('customer', [AdminController::class,"masterCustomer"]);
    Route::get('restaurant', [AdminController::class,"masterRestaurant"]);
    Route::get('settings', [AdminController::class,"masterSettings"]);

});
