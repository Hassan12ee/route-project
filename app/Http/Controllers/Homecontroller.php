<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class Homecontroller extends Controller
{
    //
    public function home()
    {
        if(Auth::user()->role =="1"){
            return view("Admin.home");
        }else{
            return redirect(Route('dashboard'));
        }
    }
}
