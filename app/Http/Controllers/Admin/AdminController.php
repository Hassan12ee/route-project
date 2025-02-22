<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function profile() {
        return view('Admin.profile');
        
    }
    public function index(){

        return view('Admin.home');
    }
}
