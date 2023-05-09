<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\CommentRequest;

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
    public function aboutus(){
        return view ('aboutus');
    }
    public function postcomment(CommentRequest $request){


        Comment::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'body'=>$request->body,
            'article_id'=>$request->article_id

        ]);
        return redirect()->back();

    }
}
