<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Middleware\CustomerMiddleware;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerCourseController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login',[CustomerAuthController::class,'login']);
Route::post('/register',[CustomerAuthController::class,'register']);


Route::middleware(CustomerMiddleware::class)->group(function (){
    Route::group(['prefix' => 'courses'], function(){
        Route::get("", [CourseController::class, 'getAllCourse']);
        Route::get("/{id}", [CourseController::class, 'getCourse']);
    });

    Route::group(['prefix' => 'user'], function() {
        Route::get("/profile", [CustomerController::class, 'getProfile']);
        Route::put("/profile", [CustomerController::class, 'updateProfile']);
        Route::post("/courses", [CustomerCourseController::class, 'store']);
        Route::delete("/courses", [CustomerCourseController::class, 'destroy']);
        Route::get("/courses", [CustomerCourseController::class, 'index']);
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
