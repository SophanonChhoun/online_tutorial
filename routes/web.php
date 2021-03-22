<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CustomerController;
use \Illuminate\Support\Facades\App;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
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
        Route::group(['prefix' => 'category'], function(){
            Route::get("/list",[CategoryController::class,'index']);
            Route::get("/create", [CategoryController::class, 'create']);
            Route::post("/create", [CategoryController::class, 'store']);
            Route::get("/show/{id}",[CategoryController::class,"show"]);
            Route::post("/update/{id}",[CategoryController::class,"update"]);
            Route::post("/update/status/{id}",[CategoryController::class,"updateStatus"]);
            Route::post("/delete/{id}",[CategoryController::class,"destroy"]);
        });

        Route::group(['prefix' => 'course'], function(){
            Route::get("/list",[CourseController::class,'index']);
            Route::get("/create", [CourseController::class, 'create']);
            Route::post("/create", [CourseController::class, 'store']);
            Route::get("/show/{id}",[CourseController::class,"show"]);
            Route::post("/update/{id}",[CourseController::class,"update"]);
            Route::post("/update/status/{id}",[CourseController::class,"updateStatus"]);
            Route::post("/delete/{id}",[CourseController::class,"destroy"]);
        });
    });

});
