<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Middleware\CustomerMiddleware;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerCourseController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\CourseLessonController;
use App\Http\Controllers\CategoryController;
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

    Route::group(["prefix" => "search"], function(){
       Route::get("/all", [CourseController::class, "allCourse"]);
       Route::post("", [CourseController::class, "searchCourse"]);
    });

    Route::group(['prefix' => 'user'], function() {
        Route::get("/profile", [CustomerController::class, 'getProfile']);
        Route::put("/profile", [CustomerController::class, 'updateProfile']);
        Route::put("/profile/password", [CustomerController::class, 'updatePassword']);
        Route::post("/courses", [CustomerCourseController::class, 'store']);
        Route::delete("/courses", [CustomerCourseController::class, 'destroy']);
        Route::get("/courses", [CustomerCourseController::class, 'index']);
        Route::get("/notes", [NoteController::class, "userNote"]);
        Route::get("/category", [CategoryController::class, "listUserCourse"]);
    });
    Route::group(['prefix' => 'notes'], function (){
        Route::post("", [NoteController::class, 'store']);
        Route::get("/{id}", [NoteController::class, 'show']);
        Route::delete("/{id}", [NoteController::class, 'destroy']);
        Route::put("/{id}", [NoteController::class, 'update']);
    });
    Route::group(['prefix' => 'lessons'], function(){
       Route::get("/{id}", [CourseLessonController::class, "show"]);
    });
    Route::group(["prefix" => "category"], function(){
        Route::get("", [CategoryController::class, "listAllCourse"]);
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
