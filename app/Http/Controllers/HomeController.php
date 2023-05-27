<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
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

    public function aboutus(){
        return view ('aboutus');
    }
    public function postcomment(CommentRequest $request){

        if(Auth::check()){
            $wirter_staus=Auth::user()->role_id;
        }else{
            $wirter_staus=6;

        }
        Comment::create([
            'name'=>$request->name,
            'writer_status'=>$wirter_staus,

            'email'=>$request->email,
            'body'=>$request->body,
            'article_id'=>$request->article_id

        ]);
        return redirect()->back();

    }
}
