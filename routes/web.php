<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\customer\CustomerController;
use App\Http\Controllers\index\IndexController;
use App\Http\Controllers\restaurant\RestaurantController;
use App\Models\Migrasi\userMigrasi;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

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
    Route::post('checkRegister', [IndexController::class,'checkRegister']);
});

Route::prefix('admin')->group(function () {
    Route::get('dashboard', [AdminController::class,"masterDashboard"]);

    Route::get('customer', [AdminController::class,"masterCustomer"])->name('homeCustomerAdmin');
    Route::get('customer/banUser/{id}', [AdminController::class,"banUser"]);

    Route::post('customer/search',[AdminController::class,"searchCustomer"]);
    Route::get('customer/search/{keyword}', [AdminController::class,"masterCustomer"]);

    Route::get('restaurant', [AdminController::class,"masterRestaurant"]);
    Route::get('restaurant/banRestaurant/{id}', [AdminController::class,"banRestaurant"]);

    Route::post('restaurant/search',[AdminController::class,"searchRestaurant"]);
    Route::get('restaurant/search/{keyword}', [AdminController::class,"masterRestaurant"])->name('homeRestaurantAdmin');

    Route::get('settings', [AdminController::class,"masterSettings"]);

});

Route::prefix('customer')->group(function () {
    Route::get('home', [CustomerController::class,"masterHome"])->name("customer_home");
    Route::get('explore', [CustomerController::class,"masterExplore"])->name("customer_search");
    Route::get('favorite', [CustomerController::class,"masterFavorite"])->name("customer_favorite");
    Route::get('history', [CustomerController::class,"masterHistory"])->name("customer_history");
    Route::get('profile', [CustomerController::class,"masterProfile"])->name("customer_profile");


    Route::get('restaurant/{restaurant_name}', [CustomerController::class,"masterRestaurant"])->name("customer_restaurant");
});

Route::prefix('restaurant')->controller(RestaurantController::class)->group(function() {
    Route::get('home', 'getHomePage');
    Route::get('history', 'getHistoryPage');
    Route::get('statistic', 'getStatisticPage');

    // Interact with reservation orders
    Route::get('confirm/{id}', 'confirmReservation');
    Route::get('reject/{id}', 'rejectReservation');

    Route::post('/updateRestaurant/{id}', 'updateRestaurant');
});
