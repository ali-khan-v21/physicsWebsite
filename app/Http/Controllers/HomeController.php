<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function loginForm(){
        return view('login-form');
    }
    
    public function loginUser(Request $request){
        return $request->all();
    }
}
