<?php

use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\ApiProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::controller(ApiProductController::class)->group(function ()   { 
    Route::get('AllProduct','index');
    Route::get('Product/{id}','show');
    Route::middleware('Api_Auth')->group(function (){

        Route::post('AddProduct','store');  
        Route::PUT('/updateProduct/{id}','update');
        Route::delete('/deleteProduct/{id}','destroy'); 
        
    });

    });


    Route::controller(ApiAuthController::class)->group(function(){

        //register
        Route::post('register',"register");
    
        //login
        Route::post('login',"login");
    
        //logout
        Route::post('logout',"logout");
    
    
    });