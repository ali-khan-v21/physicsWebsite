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
            $writer_status=Auth::user()->role_id;
            if ($writer_status<=2){
                $status=1;
            }else{
                $status=0;
            }

        }else{
            $writer_status=6;
            $status=0;

        }
    //     if($request->has('parent_id')){
    //         dd('parent_id');
    //     }else{
    //         dd($request,);

    // }
        Comment::create([
            'name'=>$request->name,
            'writer_status'=>$writer_status,
            "parent_id"=>$request->get('parent_id',null),
            "replied_to"=>$request->get('replied_to',null),
            "status"=>$status,
            'email'=>$request->email,
            'body'=>$request->body,
            'article_id'=>$request->article_id

        ]);
        return redirect()->back();

    }
}
