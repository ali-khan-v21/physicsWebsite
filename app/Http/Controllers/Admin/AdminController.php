<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Policies\AdminPolicy;
use App\Http\Requests\EditRequest;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ProfileController;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('verified');
    }
    public function index()
    {
        $this->authorize('admin-dashboard');
        $user=Auth::user();
        if($user->role->role_value<=2){

            $posts = Article::all();
        }else{
            $posts = Article::where('user_id',$user->id)->get();
        }
        return view('admin.dashboard', $data = ['posts' => $posts]);
    }
    public function newpost()
    {
        return view('admin.newpost');
    }
    public function addPost(PostRequest $request)
    {
        $this->authorize('create',Article::class);

        $user=Auth::user();
        $is_admin=Gate::allows('is_admin');
        if($is_admin){
            $status=1;
        }else{
            $status=0;
        }
        $article = Article::create([
            "title_fa" => $request->get('title_fa'),
            "title_en" => $request->get('title_en'),
            "text_fa" => $request->get('text_fa'),
            "text_en" => $request->get('text_en'),
            "category_id" => $request->get('category_id'),
            "user_id" => Auth::user()->id,
            'status'=>$status,

        ]);





        if ($article->exists) {
            // checking for image and adding it to asset('/images/posts/'.$article->id.".jpg"')
            // dd($request->hasFile("post_img"));
            if ($request->get('tags') > 0) {
                // $article->tags()->attach($tags);
                foreach ($request->get('tags') as $key => $value) {
                    $article->tags()->attach($value);
                }
            }

            if ($request->hasFile('post_img')) {
                $tmp_path = $request->file('post_img')->path();

                $file_extension = $request->file('post_img')->getClientOriginalExtension();


                $result = move_uploaded_file($tmp_path, $_SERVER["DOCUMENT_ROOT"] . '/images/posts/' . $article->id . "." . $file_extension);
                // dd($article->id);
                if ($result) {
                    //upload success
                    $article->image()->create([

                        'image_url' => $article->id . "." . $file_extension,
                    ]);
                }else{
                    $article->image()->create([

                        'image_url' =>null,
                    ]);
                }
            }else{
                $article->image()->create([

                    'image_url' =>null,
                ]);
            }
        }
        return redirect('admin/');
    }
    public function editPost($id)
    {
        // $test=Article::where("id",1)->where('name','test')->toSql();
        // dd($test);

        $post = Article::withoutGlobalScope('order')->where('id', $id)->get();

        $post = $post[0];

        return view('admin.editPost', ['post' => $post]);
    }
    public function updatePost(EditRequest $request)
    {


        $article = Article::withoutGlobalScope('order')->find($request['post_id']);
        // dd('test4');
        $this->authorize('update',$article);
        // dd('test5');

        $user=Auth::user();

        if($user->role->role_value<=2){
            $status=1;
        }else{
            $status=0;
        }
        $update_result=$article->update([
            "title_fa" => $request->get('title_fa'),
            "title_en" => $request->get('title_en'),
            "text_fa" => $request->get('text_fa'),
            "text_en" => $request->get('text_en'),
            "category_id" => $request->get('category_id'),
            'status'=>$status,

        ]);
        if ($request->get('tags') > 0) {
            // $article->tags()->attach($tags);
            $new_tags=[];
            // $article->tags()->sync();
            foreach ($request->get('tags') as $key => $value) {
                array_push($new_tags,$value);
            }
            $article->tags()->sync($new_tags);
        }
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
                Article::find($article->id)->image()->update([

                    'image_url' => $article->id . "." . $file_extension,
                ]);
            }
        }
        if ($update_result) {
            //on success
            session()->flash('status_message', 'update successful');
            session()->flash('status_type', 'success');
            return redirect(route('admin_dashboard'));
        } else {
            //on failure
            session()->flash('status_message', 'update failed');
            session()->flash('status_type', 'danger');
            return redirect(route('admin_dashboard'));
        }
    }
    public function softDelete($id)
    {
        $article = Article::find($id);
        $this->authorize('delete',$article);
        $result = $article->delete();
        if ($result) {
            //on success
            session()->flash('status_message', 'delete successful');
            session()->flash('status_type', 'warning');
            return redirect(route("admin_dashboard"));
        } else {
            //on fail
            session()->flash('status_message', 'delete failed');
            session()->flash('status_type', 'danger');
            return redirect(route("admin_dashboard"));
        }
    }
    public function forceDelete($id)
    {

        $article = Article::withTrashed()->find($id);
        $this->authorize('forceDelete',$article);
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
            session()->flash('status_message', 'force delete successful');
            session()->flash('status_type', 'warning');
            return redirect()->back();
        } else {
            //on fail
            session()->flash('status_message', 'force delete failed');
            session()->flash('status_type', 'danger');
            return redirect()->back();
        }
    }
    public function restore($id)
    {
        $article = Article::withTrashed()->find($id);
        $this->authorize('restore',$article);
        $result=$article->restore();
        if ($result) {
            //on success
            session()->flash('status_message', 'restore successful');
            session()->flash('status_type', 'success');
            return redirect()->back();
        } else {
            //on fail
            session()->flash('status_message', 'restore failed');
            session()->flash('status_type', 'danger');
            return redirect()->back();
        }
    }
    public function trashed()
    {
        $this->authorize('is_admin');
        $posts = Article::onlyTrashed()->get();;
        return view('admin.trash', ['posts' => $posts]);
    }
    public function users()
    {
        $this->authorize('is_admin');
        $users = User::all();

        return view('admin.users', ['users' => $users]);
    }
    public function editRole(Request $request)
    {
        $user_id = $request->get('user_id');
        $role_id = $request->get('role_id');

        $user = User::find($user_id);
        $role = Role::where('role_value',$role_id)->get()[0];
        $this->authorize('edit_role',[$user,$role]);
        // $this->authorize('userEdit',[$user,$role],Role::class);

        $result = $user->update([
            'role_id'=>$role->role_value,
        ]);
        // dd($result);
        if ($result) {
            // onsuccess
            session()->flash('status_message', 'user role edit successfull');
            session()->flash('status_type', 'success');
        } else {
            //on failure
            session()->flash('status_message', 'user role edit failed');
            session()->flash('status_type', 'danger');
        }

        return redirect()->back();
    }
    public function comments()
    {
        $user=Auth::user();
        $allow=Gate::allows('is_admin');
        if($allow){
            $allcomments = Comment::where('status', 1)->orderBy('created_at', "DESC")->get();

            $newcomments = Comment::withoutGlobalScope('status')->where('status', 0)->orderBy('created_at', "DESC")->get();


        }else{

            $allcomments = Comment::where('status', 1)->where('article_writer_id',$user->id)->orderBy('created_at', "DESC")->get();

            $newcomments = Comment::withoutGlobalScope('status')->where('status', 0)->where('article_writer_id',$user->id)->orderBy('created_at', "DESC")->get();


        }

        return view('admin.comments', ['allcomments' => $allcomments, 'newcomments' => $newcomments]);
    }
    public function deletecomment($id)
    {
        $result = Comment::find($id)->delete();

        if ($result) {
            //on success
            session()->flash('status_message', 'comment delete successful');
            session()->flash('status_type', 'success');
        } else {
            //on failure
            session()->flash('status_message', 'comment delete failed');
            session()->flash('status_type', 'danger');
        }

        return redirect(route('comments'));
    }
    public function acceptcomment($id)
    {
        $result = Comment::withoutGlobalScope('status')->find($id)->update([
            "status" => 1,
        ]);
        if ($result) {
            //on success
            session()->flash('status_message', 'comment acceptance successful');
            session()->flash('status_type', 'success');
        } else {
            //on failure
            session()->flash('status_message', 'acceptance failed');
            session()->flash('status_type', 'danfer');
        }


        return redirect(route('comments'));
    }
    public function replytocomment($id)
    {
        dd('reply managment here in admin controller ');
        return redirect(route('comments'));
    }
    public function edituser($id)
    {
        $this->authorize('is_admin');
        $profile=Profile::find($id);
        return view('profile', ['profile' => $profile]);
        // ProfileController::showProfile($profile);
    }
    public function deleteuser($id)
    {
        dd($id);
        return redirect(route('users'));
    }
    public function deactivateuser($id)
    {
        dd($id);
        return redirect(route('users'));
    }
    public function pendingPosts(){
        $user=Auth::user();
        $allow=Gate::allows('is_admin');
        if($allow){

            $posts=Article::withoutGlobalScope('order')->where('status',0)->get();
        }else{
            $posts=Article::withoutGlobalScope('order')->where('status',0)->
            where('user_id',$user->id)->get();

        }
        return view('admin.pendingposts',['posts'=>$posts]);
    }
    public function acceptPendingPost($id){
        $this->authorize('is_admin');
        $article=Article::withoutGlobalScope('order')->find($id);
        $result=$article->update([
            'status'=>1,
        ]);

        if ($result) {
            //on success
            session()->flash('status_message', 'post acceptance successful');
            session()->flash('status_type', 'success');
        } else {
            //on failure
            session()->flash('status_message', 'post acceptance failed');
            session()->flash('status_type', 'danger');
        }
        return $this->pendingPosts();


    }public function deletePendingPost($id){
        $this->authorize('is_admin');
        $article=Article::withoutGlobalScope('order')->find($id);
        $result=$article->delete();
        if ($result) {
            //on success
            session()->flash('status_message', 'post delete successful');
            session()->flash('status_type', 'success');
        } else {
            //on failure
            session()->flash('status_message', 'post delete failed');
            session()->flash('status_type', 'danger');
        }
        return $this->pendingPosts();
    }public function deactivatePost($id){
        $this->authorize('is_admin');
        $article=Article::find($id);
        $result=$article->update([
            'status'=>0,
        ]);

        if ($result) {
            //on success
            session()->flash('status_message', 'post deactivation successful');
            session()->flash('status_type', 'success');
        } else {
            //on failure
            session()->flash('status_message', 'post deactivation failed');
            session()->flash('status_type', 'danger');
        }
        return $this->index();

    }
}
