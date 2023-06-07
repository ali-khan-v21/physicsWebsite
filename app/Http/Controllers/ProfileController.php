<?php

namespace App\Http\Controllers;

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
}
