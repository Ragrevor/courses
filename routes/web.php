<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;


Route::get('/', [CourseController::class, "index"]);

Route::post("/enroll",[ApplicationController::class, "new_application"]);

Route::get("/admin",[AdminController::class, "index"]);

Route::get('/application/{id_application}/confirm', [ApplicationController::class,"confirm"]);

Route::post('/course/create', [CourseController::class, "create"]);

Route::post('/category/create', [CategoryController::class, "create"]);
