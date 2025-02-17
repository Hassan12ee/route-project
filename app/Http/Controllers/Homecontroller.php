<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Homecontroller extends Controller
{
    //
    public function home()
    {
        if(Auth::user()->role =="1"){
            return redirect(url('home'));
        }else{
            return view('dashboard');
        }
    }
}
