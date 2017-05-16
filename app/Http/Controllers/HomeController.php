<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Post;
use DB;
use Carbon\Carbon;
use App\User;

use App\UserProfile;

class HomeController extends Controller
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
        if ($Profile === null) {
            $profile = new UserProfile;
            $profile->id = $id;
            $profile->profilepic = "default.png";
            $profile->save();
        }

        $comments = DB::table('comments')
            ->orderby('created_at', 'desc')
            ->get();

        $posts = DB::table('user_posts')
            ->orderby('created_at', 'desc')
            ->paginate(20);

        foreach($posts as $p)
        {
            $Profile = UserProfile::where('id', '=', $p->uid)->first();
            $p->profilepic = $Profile->profilepic;
            $p->created_at = Carbon::createFromFormat('Y-m-d H:i:s', $p->created_at)->diffForHumans();
        }

        foreach($comments as $c)
        {
            $commentUser = User::where('id', '=', $c->uid)->first();
            $Profile = UserProfile::where('id', '=', $c->uid)->first();
            $c->username = $commentUser->name;
            $c->profilepic = $Profile->profilepic;
            $c->created_at = Carbon::createFromFormat('Y-m-d H:i:s', $c->created_at)->diffForHumans();
        }

        return view('home', [
            'authUser' => $user,
            'user' => $user,
            'userid' => $id,
            'posts' =>$posts,
            'comments' => $comments,
        ]);
    }

    public function top()
    {
        $user = Auth::user();
        $id = Auth::id();

        $Profile = UserProfile::where('id', '=', $user->id)->first();
        if ($Profile === null) {
            $profile = new UserProfile;
            $profile->id = $id;
            $profile->profilepic = "default.png";
            $profile->save();
        }

        $comments = DB::table('comments')
            ->orderby('created_at', 'desc')
            ->get();

        $posts = DB::table('user_posts')
            ->orderby('votes', 'desc')
            ->orderby('created_at', 'desc')

            ->paginate(20);

        foreach($posts as $p)
        {
            $Profile = UserProfile::where('id', '=', $p->uid)->first();
            $p->profilepic = $Profile->profilepic;
            $p->created_at = Carbon::createFromFormat('Y-m-d H:i:s', $p->created_at)->diffForHumans();
        }

        foreach($comments as $c)
        {
            $commentUser = User::where('id', '=', $c->uid)->first();
            $Profile = UserProfile::where('id', '=', $c->uid)->first();
            $c->username = $commentUser->name;
            $c->profilepic = $Profile->profilepic;
            $c->created_at = Carbon::createFromFormat('Y-m-d H:i:s', $c->created_at)->diffForHumans();
        }

        return view('home', [
            'authUser' => $user,
            'user' => $user,
            'userid' => $id,
            'posts' =>$posts,
            'comments' => $comments,
        ]);
    }

    public function worst()
    {
        $user = Auth::user();
        $id = Auth::id();

        $Profile = UserProfile::where('id', '=', $user->id)->first();
        if ($Profile === null) {
            $profile = new UserProfile;
            $profile->id = $id;
            $profile->profilepic = "default.png";
            $profile->save();
        }

        $comments = DB::table('comments')
            ->orderby('created_at', 'desc')
            ->get();

        $posts = DB::table('user_posts')
            ->orderby('votes', 'asc')
            ->orderby('created_at', 'desc')
            ->paginate(20);

        foreach($posts as $p)
        {
            $Profile = UserProfile::where('id', '=', $p->uid)->first();
            $p->profilepic = $Profile->profilepic;
            $p->created_at = Carbon::createFromFormat('Y-m-d H:i:s', $p->created_at)->diffForHumans();
        }

        foreach($comments as $c)
        {
            $commentUser = User::where('id', '=', $c->uid)->first();
            $Profile = UserProfile::where('id', '=', $c->uid)->first();
            $c->username = $commentUser->name;
            $c->profilepic = $Profile->profilepic;
            $c->created_at = Carbon::createFromFormat('Y-m-d H:i:s', $c->created_at)->diffForHumans();
        }

        return view('home', [
            'authUser' => $user,
            'user' => $user,
            'userid' => $id,
            'posts' =>$posts,
            'comments' => $comments,
        ]);
    }
}
