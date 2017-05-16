<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DB;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function newPost(Request $request)
    {
        $authUser = Auth::user();

        $this->validate($request, [
            'fileToUpload' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $this->validate($request, [
            'content' => 'max:2048',
        ]);

        if ($request->hasFile('photoToUpload')) {
            $file = $request->file('photoToUpload')->store('images');
            $filepath = $request->file('photoToUpload')->hashName();
            $post = new Post();
            $post->uid = $authUser->id;
            $post->content = $request->content;
            $post->photo = $filepath;
            $post->ipaddress = \Request::ip();
        } else {

            $this->validate($request, [
                'content' => 'required|max:2048',
            ]);

            $post = new Post();
            $post->uid = $authUser->id;
            $post->content = $request->content;
            $post->ipaddress = \Request::ip();

        }

        $post->save();

        return back()
            ->with('success','You post has been submitted!');
    }

    public function deletePost($postid)
    {
        DB::table('posts')->where('postid', '=', $postid)->delete();

        return back()
            ->with('success','Post deleted!');
    }

    public function upVote($postid)
    {
        DB::table('posts')
            ->where('postid', $postid)
            ->increment('votes');

        return back();
    }

    public function downVote($postid)
    {
        DB::table('posts')
            ->where('postid', $postid)
            ->decrement('votes');

        return back();
    }


}