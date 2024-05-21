<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

//get all todo's
Route::get('/', [TodoController::class, 'index']);

//add todo route
Route::post('add-data', [TodoController::class, 'store']);


//delete todo route
Route::get('/delete/{id}', [TodoController::class, 'delete']);
//update todo route
Route::get('/update/{id}', [TodoController::class, 'update']);


//logout todo route
Route::get('/login', [LoginController::class, 'index']);

//ke halaman registrasi todo route
Route::get('/registrasi', [RegistrasiController::class, 'registrasi']);

//get id user untuk regis
Route::post('registrasi-user', [RegistrasiController::class, 'store']);

//get id user untuk login
Route::post('login-user', [LoginController::class, 'auth']);

//logout user
Route::get('/logout', [LogoutController::class, 'logout']);
