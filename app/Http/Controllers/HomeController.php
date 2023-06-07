<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Article;
use App\Models\Comment;


use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;

class HomeController extends Controller
{
    public function index()
    {
        if(request()->has('q')){
            $query=request()->input('q');
            $posts=Article::where('title_'.app()->getLocale(),'LIKE','%'.$query.'%')->paginate(6);
            return view('search',['posts'=>$posts]);
        }else{
            $categories = Category::all();
            return view('index', ['categories' => $categories]);

        }


    }

    public function aboutus(){
        $writers=User::where("role_id","<",4)->get();
        // dd($writers);
        return view('aboutus',['writers'=>$writers]);
    }
    public function postcomment(CommentRequest $request){
        $article=Article::find($request->article_id);

        // dd($request);

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
            'article_id'=>$request->article_id,
            'article_writer_id'=>$article->writer->id,

        ]);
        return redirect()->back();

    }
    public function writer($id){
        $writer=User::find($id);
        // dd($writer);
        $posts=$writer->articles;
        return view('writer',['posts'=>$posts,'writer'=>$writer]);
    }
}
