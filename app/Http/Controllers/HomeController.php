<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories=Category::all();
        return view('index',['categories'=>$categories]);
    }
    public function loginForm(){
        return view('login-form');
    }

    public function loginUser(LoginRequest $request){

        return $request->all();
    }
}
