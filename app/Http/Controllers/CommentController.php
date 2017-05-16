<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Post;
use DB;
use Carbon\Carbon;
use App\Comment;

use App\UserProfile;

class CommentController extends Controller
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
    public function newComment(Request $request)
    {
        $authUser = Auth::user();

        $comment = new Comment();
        $comment->uid = $request->uid;
        $comment->postid = $request->postid;
        $comment->content = $request->commentcontent;

        $comment->save();

        return back()
            ->with('success','Comment saved!');
    }
}
