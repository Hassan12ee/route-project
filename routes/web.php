<?php

use App\Http\Controllers\Admin\Home_adminController;
use App\Http\Controllers\Homecontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get("home",[Homecontroller::class,'home']);
});

Route::middleware([
    'Isadmin'
])->group(function(){
    Route::get("Admin/home",[Home_adminController::class,'index']);
});