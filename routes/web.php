<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\IdentificationController;
use App\Http\Controllers\IdentificationTypeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingTypeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactUsController;
use \Illuminate\Support\Facades\App;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\SlidersController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Middleware\AdminRoleMiddleware;
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


Route::get("/",[AdminAuthController::class,"signin"]);
Route::post('/admin/login',[AdminAuthController::class,'login']);

Route::get("/auth/google/login",[AdminAuthController::class,"redirectToProvider"]);
Route::get("/auth/google/callback",[AdminAuthController::class,"handleProviderCallback"]);

Route::middleware(AdminMiddleware::class)->group(function (){
    Route::group(["prefix" => "admin"],function() {
        Route::get("/logout",[AdminAuthController::class,"logout"]);
        Route::get("/dashboard", [DashboardController::class,"index"]);
        Route::group(['prefix' => 'user'], function(){
            Route::get("/list",[UserController::class,'index']);
            Route::get("/create",[UserController::class,"create"]);
            Route::post("/create",[UserController::class,"store"]);
            Route::get("/show/{id}",[UserController::class,"show"]);
            Route::post("/update/{id}",[UserController::class,"update"]);
            Route::post("/update/status/{id}",[UserController::class,"updateStatus"]);
            Route::post("/delete/{id}",[UserController::class,"destroy"]);
        });
        Route::group(['prefix' => 'customer'], function(){
            Route::get("/list",[CustomerController::class,'index']);
            Route::get("/create", [CustomerController::class, 'create']);
            Route::post("/create", [CustomerController::class, 'store']);
            Route::post("/update/status/{id}",[CustomerController::class,"updateStatus"]);
        });

    });

});
