<?php
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('home');
});
Route::resource('/student',StudentController::class);
Route::resource('/department',DepartmentController::class);