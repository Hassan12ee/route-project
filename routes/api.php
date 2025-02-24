<?php

use App\Http\Controllers\Api\ApiProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::controller(ApiProductController::class)->group(function ()   { 
    Route::get('AllProduct','index')->name('allproduct');
    Route::get('Product/{id}','show')->name('product');
    Route::post('AddProduct','store')->name('storeproduct');  
    Route::PUT('/updateProduct/{id}','update');
    Route::delete('/deleteProduct/{id}','destroy'); 
    });