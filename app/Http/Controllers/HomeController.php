<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class HomeController extends Controller
{
    public function index()
    {

        $categories = Category::all();
        // $posts = array();
        // foreach ($categories as $category) {
        //     $posts->array_push();
        // }

        return view('index', ['categories' => $categories]);
    }
    public function loginForm()
    {
        $categories = Category::all();
        return view('login-form', ['categories' => $categories]);
    }

    public function loginUser(LoginRequest $request)
    {

        if (true) {

            return redirect()->route('admin_dashboard');
        }
    }
}
