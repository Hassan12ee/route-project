<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Homecontroller;
use Illuminate\Support\Facades\Route;
use app\Http\Middleware\IsAdmin;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get("home",[Homecontroller::class,'home']);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
   
});

Route::group([
    
    'middleware'=>'Isadmin',
    
    
],function(){
    
    Route::get('/AddProduct',[ProductController::class, 'create']);
    Route::post('/AddProduct',[ProductController::class, 'store'])->name('Addproduct');
    Route::get('/profile',[AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/AllProduct',[ProductController::class, 'show'])->name('allproduct');

});

