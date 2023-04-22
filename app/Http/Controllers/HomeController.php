<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function loginForm(){
        return view('login-form');
    }

    public function loginUser(LoginRequest $request){
        
        return $request->all();
    }
}
