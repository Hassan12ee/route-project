<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\User\ProductsController;
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
    Route::controller(ProductsController::class)->group(function ()   {
        // Route::get('/AddProduct','create');
        // Route::post('/AddProduct','store')->name('Addproduct');   
        // Route::get('/AllProduct','show')->name('allproduct'); 
        });
        Route::middleware(['Isadmin'])->group(function () {
                Route::get('/profile',[AdminController::class, 'profile'])->name('admin.profile');
                Route::get('/Home',[AdminController::class, 'index'])->name('admin.home');
                Route::controller(ProductController::class)->group(function ()   {
                Route::get('/AddProduct','create')->name('Addproduct');
                Route::post('/AddProduct','store')->name('storeproduct');   
                Route::get('/AllProduct','show')->name('allproduct'); 
                });
            });
        
});




