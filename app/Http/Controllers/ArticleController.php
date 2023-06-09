<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function all($subject){
        $category=Category::where("category_key",$subject)->get();
        $category=$category[0];

        $posts=Article::where('category_id',$category['id'])->paginate(6);

        return view('page',["category"=>$category,'posts'=>$posts]);
    }
    public function tag_all($subject){
        $tags=Tag::where("tag_key",$subject)->get();
        $tag=$tags[0];

        $posts=$tag->articles()->paginate(8);

        return view('tag',["tag"=>$tag,'posts'=>$posts]);
    }

    // public function tag_show($subject,$id){

    public function show($subject,$id){

        $categories=Category::where("category_key",$subject)->get();
        $category=$categories[0];

        $post=Article::where('id',$id)->with('comments.replies','comments.replies.replies')->get();
        
        $post=$post[0];
        if(request()->has('tagId')){
            $tag=Tag::find(request()->input('tagId'));
            return view('article',['post'=>$post,"category"=>$category,'tag'=>$tag]);
            // dd(request()->input('tagId'));
        }else{
            return view('article',['post'=>$post,"category"=>$category]);

        }
    }
}
