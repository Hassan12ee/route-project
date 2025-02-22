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
         $view = Product::all();
        return view('Admin.All_product',compact('view'));
        
    
    }
}
