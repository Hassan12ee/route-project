<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function index()
    {
        //
         $Product = Product::all();
        return view('Users.Products',compact('Product'));
        
    
    }
}
