<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Post;
use DB;
use Carbon\Carbon;
use App\Vote;
use App\UserProfile;

class VoteController extends Controller
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
    public function upVote($postid, $userid)
    {
        $authUser = Auth::user();
        $voteUser = Vote::where('uid', '=', $userid)
            ->where('postid', '=', $postid)->first();

        $vote = new Vote();
        $vote->uid = $userid;
        $vote->postid = $postid;
        $vote->vote = 1;

        if($voteUser){
            return back()
                ->with('error','You have already voted!');
        } else {
            $vote->save();
            DB::table('posts')
                ->where('postid', $postid)
                ->increment('votes');
            return back()
                ->with('success','Vote saved!');
        }



    }

    public function downVote($postid, $userid)
    {
        $authUser = Auth::user();
        $voteUser = Vote::where('uid', '=', $userid)
            ->where('postid', '=', $postid)->first();


        $vote = new Vote();
        $vote->uid = $userid;
        $vote->postid = $postid;
        $vote->vote = -1;

        if($voteUser){
            return back()
                ->with('error','You have already voted!');
        } else {
            $vote->save();
            DB::table('posts')
                ->where('postid', $postid)
                ->decrement('votes');
            return back()
                ->with('success','Vote saved!');
        }
    }
}
