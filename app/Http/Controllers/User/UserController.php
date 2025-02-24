<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function home()
    {
        $Product =Product::all();
        return view('Users.home',compact('Product'));
    }
    public function About()
    {
        return view('Users.About');
    }
    public function Contact()
    {
        return view('Users.Contact');
    }
}
