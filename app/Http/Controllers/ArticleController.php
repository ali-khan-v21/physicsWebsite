<?php

namespace App\Http\Controllers;

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

    public function show($subject,$id){
        return $subject." - ".$id;
    }
}
