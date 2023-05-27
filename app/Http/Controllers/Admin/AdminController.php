<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\EditRequest;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('verified');
    }
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
            // dd($request->hasFile("post_img"));
            if ($request->hasFile('post_img')) {
                $tmp_path = $request->file('post_img')->path();

                $file_extension = $request->file('post_img')->getClientOriginalExtension();


                $result = move_uploaded_file($tmp_path, $_SERVER["DOCUMENT_ROOT"] . '/images/posts/' . $article->id . "." . $file_extension);
                if ($result) {
                    //upload success
                    Article::find($article->id)->update([
                        'image_url' => $article->id . "." . $file_extension,
                    ]);
                }
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
        // dd($request->file('new_img'));
        if ($request->hasFile('new_img')) {
            $tmp_path = $request->file('new_img')->path();

            $file_extension = $request->file('new_img')->getClientOriginalExtension();
            $images_path = $_SERVER["DOCUMENT_ROOT"] . '/images/posts/';
            $new_fileName = $images_path . $request['post_id'] . "." . $file_extension;

            if ($request['image_url'] != null) {
                if (file_exists($new_fileName)) {
                    chmod($new_fileName, 0755); //Change the file permissions if allowed
                    unlink($new_fileName); //remove the file
                }
            }


            $result = move_uploaded_file($tmp_path, $new_fileName);
            if ($result) {
                //upload success
                Article::find($request['post_id'])->update([
                    'image_url' => $request['post_id'] . "." . $file_extension,
                ]);
            }
        }
        if ($result) {
            //on success
            session()->flash('status_message','update successful');
            session()->flash('status_type','success');
            return redirect(route('admin_dashboard'));
        } else {
            //on failure
            session()->flash('status_message','update failed');
            session()->flash('status_type','danger');
            return redirect(route('admin_dashboard'));
        }
    }
    public function softDelete($id)
    {
        $result = Article::find($id)->delete();
        if ($result) {
            //on success
            session()->flash('status_message','delete successful');
            session()->flash('status_type','warning');
            return redirect(route("admin_dashboard"));
        } else {
            //on fail
            session()->flash('status_message','delete failed');
            session()->flash('status_type','danger');
            return redirect(route("admin_dashboard"));
        }
    }
    public function forceDelete($id)
    {

        $article = Article::withTrashed()->find($id);
        $images_path = $_SERVER["DOCUMENT_ROOT"] . '/images/posts/';

        if ($article->image_url != null) {
            if (file_exists($images_path . $article->image_url)) {
                chmod($images_path . $article->image_url, 0755); //Change the file permissions if allowed
                unlink($images_path . $article->image_url); //remove the file
            }
        }
        $result = $article->forceDelete();
        if ($result) {
            //on success
            session()->flash('status_message','force delete successful');
            session()->flash('status_type','warning');
            return redirect()->back();
        } else {
            //on fail
            session()->flash('status_message','force delete failed');
            session()->flash('status_type','danger');
            return redirect()->back();
        }
    }
    public function restore($id)
    {
        $result = Article::withTrashed()->find($id)->restore();
        if ($result) {
            //on success
            session()->flash('status_message','restore successful');
            session()->flash('status_type','success');
            return redirect()->back();
        } else {
            //on fail
            session()->flash('status_message','restore failed');
            session()->flash('status_type','danger');
            return redirect()->back();
        }
    }
    public function trashed()
    {
        $posts = Article::onlyTrashed()->get();;
        return view('admin.trash', ['posts' => $posts]);
    }
    public function users(){
        $users=User::all();

        return view('admin.users',['users'=>$users]);

    }
    public function editRole(Request $request ){
        $user_id=$request->get('user_id');
        $role_id=$request->get('role_id');
        $user=User::find($user_id);
        $role=Role::find($role_id);
        $result=$user->roles()->sync($role);
        if ($result) {
            // onsuccess
            session()->flash('status_message','user role edit successfull');
            session()->flash('status_type','success');

        }else{
            //on failure
            session()->flash('status_message','user role edit failed');
            session()->flash('status_type','danger');
        }

        return redirect()->back();
    }
    public function comments(){
        $allcomments=Comment::where('status',1)->orderBy('created_at',"DESC")->get();
        $newcomments=Comment::where('status',0)->orderBy('created_at',"DESC")->get();
        return view('admin.comments',['allcomments'=>$allcomments,'newcomments'=>$newcomments]);
    }
    public function deletecomment($id){
        $result=Comment::find($id)->delete();

        if($result){
            //on success
            session()->flash('status_message','comment delete successful');
            session()->flash('status_type','success');
        }
        else{
            //on failure
            session()->flash('status_message','comment delete failed');
            session()->flash('status_type','danger');
        }

        return redirect(route('comments'));

    }
    public function acceptcomment($id){
        $result=Comment::find($id)->update([
            "status"=>1,
        ]);
        if($result){
            //on success
            session()->flash('status_message','comment acceptance successful');
            session()->flash('status_type','success');
        }else{
            //on failure
            session()->flash('status_message','acceptance failed');
            session()->flash('status_type','danfer');
        }


        return redirect(route('comments'));

    }
    public function replytocomment($id){
        dd('reply managment here in admin controller ');
        return redirect(route('comments'));
    }
    public function edituser($id){
        dd($id);
        return redirect(route('users'));
    }
    public function deleteuser($id){
        dd($id);
        return redirect(route('users'));
    }
    public function deactivateuser($id){
        dd($id);
        return redirect(route('users'));
    }
}
