<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Resume;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('verified');
    }
    public function index()
    {
        $profile = Auth::user()->profile;
        return $this->showProfile($profile);
    }
    public function showProfile($profile){

        return view('profile', ['profile' => $profile]);

    }
    public function editProfile(Request $request)
    {
        $profile_id = $request->get('profile-id');
        $profile = Profile::find($profile_id);
        $this->authorize("update", $profile);

        if ($request->hasfile('profile_image')) {
            $tmp_path = $request->file('profile_image')->path();

            $file_extension = $request->file('profile_image')->getClientOriginalExtension();
            $images_path = $_SERVER["DOCUMENT_ROOT"] . '/images/users/';
            $new_fileName = $images_path . $request['profile-id'] . "." . $file_extension;

            if ($request['profile_image'] != null) {
                if (file_exists($new_fileName)) {
                    chmod($new_fileName, 0755); //Change the file permissions if allowed
                    unlink($new_fileName); //remove the file
                }
            }


            $result = move_uploaded_file($tmp_path, $new_fileName);
            if ($result) {
                //upload success
                Profile::find($profile->id)->image()->update([

                    'image_url' => "users/".$profile->id . "." . $file_extension,
                ]);
            }

        }

        if ($request->has('username')) {
            $profile->user->update([
                'username'=>$request->get('username'),
            ]);
        }
        if ($request->has('useremail')) {
            $profile->user->update([
                'email'=>$request->get('useremail'),
                "email_verified_at"=>Null,
            ]);

        }
        if ($request->has('firstname_fa')) {
            $profile->update([
                'firstname_fa'=>$request->get('firstname_fa'),
            ]);
        }
        if ($request->has('firstname_en')) {
            $profile->update([
                'firstname_en'=>$request->get('firstname_en'),
            ]);
        }
        if ($request->has('lastname_en')) {
            $profile->update([
                'lastname_en'=>$request->get('lastname_en'),
            ]);
        }
        if ($request->has('lastname_fa')) {
            $profile->update([
                'lastname_fa'=>$request->get('lastname_fa'),
            ]);
        }

        return $this->showProfile($profile);

    }
    public function showResume(){
        $user = Auth::user();
        $resumes = $user->resumes;
        return view('userresume',['resumes'=>$resumes,'user'=>$user]);
    }
    public function editResume(Request $request){
        $resume_id = $request->get('resume_id');
        $resume = Resume::find($resume_id);
        $this->authorize('editResume',$resume->user->profile);

        if($request->has('title_fa')){
            $resume->update([
                'title_fa'=>$request->input('title_fa')
            ]);

        }
        if($request->has('title_en')){
            $resume->update([
                'title_en'=>$request->input('title_en')
            ]);

        }
        if($request->has('desc_fa')){
            $resume->update([
                'desc_fa'=>$request->input('desc_fa')
            ]);

        }
        if($request->has('desc_en')){
            $resume->update([
                'desc_en'=>$request->input('desc_en')
            ]);

        }
        if($request->has('delete_id')){
            $resume->delete();

        }
        return $this->showResume();

    }
    public function createResume(Request $request){
        $user_id = $request->get('user_id');
        $user = User::find($user_id);
        $this->authorize('createResume',$user->profile);
        // dd($user_id);

        $resume=Resume::create([
            'user_id'=>$user_id,
            'title_fa'=>$request->input('title_fa'),
            'title_en'=>$request->input('title_en'),
            'desc_fa'=>$request->input('desc_fa'),
            'desc_en'=>$request->input('desc_en'),
        ]);
        return $this->showResume();


    }
}
