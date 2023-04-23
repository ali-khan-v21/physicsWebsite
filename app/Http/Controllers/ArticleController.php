<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function all($subject){
        $categories=Category::all();
        return view('page',["categories"=>$categories]);
    }
    public function show($subject,$id){
        return $subject." - ".$id;
    }
}
