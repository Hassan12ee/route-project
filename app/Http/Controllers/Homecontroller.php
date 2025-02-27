<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class Homecontroller extends Controller
{
    //
    public function home()
    {
        if(Auth::user()->role =="1"){
            return redirect( Route("admin.home"));
        }else{
            $Product = Product::all();
            return view('Users.home',compact('Product'));
        }
    }

}
