<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {return view('index');});

Route::get('/register',[SigninController::class, 'register']);
Route::get('/login',[SigninController::class, 'login']);
Route::post('/register',[SigninController::class, 'register_store']);
Route::post('/login',[SigninController::class, 'authenticate']);
Route::get('/logout',[SigninController::class, 'logout']);

Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/paket', [AdminController::class, 'index']);
