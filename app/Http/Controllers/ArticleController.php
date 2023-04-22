<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function all($subject){
        return $subject." all";
    }
    public function show($subject,$id){
        return $subject." - ".$id;
    }
}
