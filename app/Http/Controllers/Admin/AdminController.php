<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\EditRequest;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $posts = Article::orderBy("updated_at", "DESC")->get();
        return view('admin.dashboard', $data = ['posts' => $posts]);
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
            if ($request->hasFile('post_img')) {
                $tmp_path = $request->file('post_img')->path();

                $file_extension = $request->file('post_img')->getClientOriginalExtension();


                $result=move_uploaded_file($tmp_path,$_SERVER["DOCUMENT_ROOT"].'/images/posts/'.$article->id.".".$file_extension);
                if($result){
                    //upload success
                    Article::find($article->id)->update([
                        'image_url'=>$article->id.".".$file_extension,
                    ]);
                    // dd($article->id);

                }else{
                    // dd($result);
                    //on upload failed
                    Article::find($article->id)->update([
                        'image_url'=>'default.jpg'
                    ]);

                }

            }else{
                //when no image uploaded
                Article::find($article->id)->update([
                    'image_url'=>'default.jpg'
                ]);
            }
        }
        return redirect('admin/');
    }
    public function editPost($id)
    {
        // $test=Article::where("id",1)->where('name','test')->toSql();
        // dd($test);

        $post = Article::where('id', $id)->get();
        $post = $post[0];

        return view('admin.editPost', ['post' => $post]);
    }
    public function updatePost(EditRequest $request)
    {

        $result = Article::find($request['post_id'])->update([
            'title_fa' => $request['title_fa'],
            'text_fa' => $request['text_fa'],
            'title_en' => $request['title_en'],
            'text_en' => $request['text_en'],
            'category_id' => $request['category_id']

        ]);
        if ($result) {
            //on success
            return redirect(route('admin_dashboard'));
        } else {
            //on failure
            return redirect()->back();
        }
    }
    public function softDelete($id)
    {
        $result = Article::find($id)->delete();
        if ($result) {
            //on success

            return redirect(route("admin_dashboard"));
        } else {
            //on fail
            return redirect(route("admin_dashboard"));
        }
    }
    public function forceDelete($id)
    {

        $result = Article::withTrashed()->find($id)->forceDelete();

        if ($result) {
            //on success
            return redirect()->back();
        } else {
            //on fail
            return redirect()->back();
        }
    }
    public function restore($id)
    {
        $result = Article::withTrashed()->find($id)->restore();
        if ($result) {
            //on success
            return redirect()->back();
        } else {
            //on fail
            return redirect()->back();
        }
    }
    public function trashed()
    {
        $posts = Article::onlyTrashed()->get();;
        return view('admin.trash', ['posts' => $posts]);
    }
}
