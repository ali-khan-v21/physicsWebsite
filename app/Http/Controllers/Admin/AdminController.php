<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $posts=Article::orderBy("created_at","DESC")->get();
        return view('admin.dashboard',['posts'=>$posts]);
    }
    public function newpost()
    {
        return view('admin.newpost');
    }
    public function addPost(PostRequest $request)
    {
        $article = new Article();
        $article->title_fa = $request->get('title_fa');
        $article->title_en = $request->get('title_en');
        $article->text_fa = $request->get('text_fa');
        $article->text_en = $request->get('text_en');

        $article->category_id = $request->get('category_id');
        $article->writer_id = 1;
        $article->save();
        if ($article->exists) {
            // checking for image and adding it to asset('/images/posts/'.$article->id.".jpg"')
            if($request->hasFile('post_img')){
                dd($request->files());
            }
            // $fileName=$article->id;
        }
        return redirect('admin/');
    }
}
