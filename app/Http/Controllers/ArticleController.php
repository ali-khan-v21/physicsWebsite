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

        $posts=Article::where('category_id',$category['id'])->orderBy('updated_at','DESC')->get();

        return view('page',["category"=>$category,'posts'=>$posts]);
    }
    public function tag_all($subject){
        $tags=Tag::where("tag_key",$subject)->get();
        $tag=$tags[0];

        // $posts=Article::where('tag_id',$category['id'])->orderBy('updated_at','DESC')->get();
        $posts=$tag->articles;

        return view('tag',["tag"=>$tag,'posts'=>$posts]);
    }

    public function tag_show($subject,$id){
        $tags=Tag::where("tag_key",$subject)->get();
        $tag=$tags[0];

        $post=Article::where('id',$id)->get();
        $post=$post[0];
        return view('tagarticle',['post'=>$post,"tag"=>$tag]);
    }
    public function show($subject,$id){
        $categories=Category::where("category_key",$subject)->get();
        $category=$categories[0];

        $post=Article::where('id',$id)->get();
        $post=$post[0];
        return view('article',['post'=>$post,"category"=>$category]);
    }
}
