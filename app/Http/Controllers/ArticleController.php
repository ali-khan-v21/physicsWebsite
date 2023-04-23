<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function all($subject){
        $categories=Category::all();

        $category=Category::where("category_key",$subject)->get(['id','name_fa','name_en']);
        return view('page',["category"=>$category[0],'categories'=>$categories]);
    }
    public function show($subject,$id){
        return $subject." - ".$id;
    }
}
