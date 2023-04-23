<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }
    public function newpost(){
        return view('admin.newpost');
    }
    public function addPost(Request $request){
        $article=new Article();
        $article->title_fa=$request->get('title_fa');
        $article->title_en=$request->get('title_en');
        $article->text_fa=$request->get('text_fa');
        $article->text_en=$request->get('text_en');

        $article->category_id=$request->get('category_id');
        $article->writer_id=1;
        $article->save();
        if($article->exists){

            $fileName=$article->id;
        }

    }
}
