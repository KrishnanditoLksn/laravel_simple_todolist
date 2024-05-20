<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/',[TodoController::class,'index']);
Route::post('add-data',[TodoController::class,'store']);

Route::get('/delete/{id}' , [TodoController::class,'delete']);
Route::get('/update/{id}' , [TodoController::class,'update']);
