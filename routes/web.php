<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\User\ProductsController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use app\Http\Middleware\IsAdmin;

Route::controller(UserController::class)->group(function () {
    Route::get('/', 'home')->name("User.home");
    Route::get("/About","About")->name("User.About");
    Route::get("/Contact",'Contact')->name("User.Contact");

});

 Route::get('/Products',[ProductsController::class,'index'])->name('products'); 
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get("home",[Homecontroller::class,'home']);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
        // Route::get('/AllProduct',[ProductsController::class,'show'])->name('allproduct'); 

        Route::middleware(['Isadmin'])->group(function () {
                Route::get('/profile',[AdminController::class, 'profile'])->name('admin.profile');
                Route::get('/Home',[AdminController::class, 'index'])->name('admin.home');
                Route::controller(ProductController::class)->group(function ()   {
                Route::get('/AddProduct','create')->name('Addproduct');
                Route::post('/AddProduct','store')->name('storeproduct');   
                Route::get('/AllProduct','show')->name('allproduct');
                Route::get('/editProduct/{id}','edit');
                Route::PUT('/updateProduct/{id}','update');
                Route::delete('/deleteProduct/{id}','destroy'); 
                });
            });
        
});




