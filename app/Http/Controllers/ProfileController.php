<?php

namespace App\Http\Controllers;

use App\User;
use App\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $id = Auth::id();

        $Profile = UserProfile::where('id', '=', $user->id)->first();

        return view('profile', [
            'authUser' => $user,
            'userid' => $id,
            'user' => $user,
            'profile' => $Profile,
        ]);
    }

    public function uploadPicture(Request $request)
    {
        $user = Auth::user();
        $userProfile = UserProfile::where('id', '=', $user->id)->first();

        $this->validate($request, [
            'fileToUpload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $file = $request->file('fileToUpload')->store('images');
        $filepath = $request->file('fileToUpload')->hashName();


        $userProfile->profilepic = $filepath;
        $userProfile->save();
        return back()
            ->with('success','Image Uploaded successfully.');

    }

    public function editProfile(Request $request)
    {
        $user = Auth::user();
        $userProfile = UserProfile::where('id', '=', $user->id)->first();

        $this->validate($request, [
            'firstname' => 'nullable|max:255',
            'lastname' => 'nullable|max:255',
            'age' => 'numeric|nullable|max:255',
            'location' => 'nullable|max:255',
        ]);

        $userProfile->firstname = $request->firstname;
        $userProfile->lastname = $request->lastname;
        $userProfile->age = $request->age;
        $userProfile->location = $request->location;

        $userProfile->save();

        return back()
            ->with('success','Your changes have been saved!');
    }

    public function deleteProfilePicture()
    {
        $user = Auth::user();
        $userProfile = UserProfile::where('id', '=', $user->id)->first();

        $userProfile->profilepic = 'default.png';
        $userProfile->save();

        return back()
            ->with('success','Profile Picture Deleted!');

    }

    public function searchProfiles(Request $request)
    {
        $user = Auth::user();
        $username = $request->username;
        $users = User::where('name', 'like', '%' . $username . '%')->get();

        foreach($users as $u)
        {
            $profileUser = UserProfile::where('id', '=', $u->id)->first();
            $u->profilepic = $profileUser->profilepic;
        }

        return view('profilesearch', [
            'users' => $users,
            'authUser' => $user,
        ]);

    }

    public function profiles($id)
    {
        $authUser = Auth::user();
        $userProfile = UserProfile::where('id', '=', $id)->first();
        $profileUser = User::where('id', '=', $id)->first();
        if($authUser->id == $profileUser->id){
            return view('profile', [
                'authUser' => $authUser,
                'user' => $authUser,
                'userid' => $id,
                'profile' => $userProfile,
            ]);
        } else {
            return view('profiles', [
                'profileUser' => $profileUser,
                'authUser' => $authUser,
                'userid' => $id,
                'profile' => $userProfile,
            ]);
        }


    }
}
