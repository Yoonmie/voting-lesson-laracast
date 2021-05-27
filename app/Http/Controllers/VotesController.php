<?php

namespace App\Http\Controllers;

use App\Models\CommunityLink;
use App\Models\CommunityLinkVote;
use Illuminate\Http\Request;

class VotesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(CommunityLink $link)
    {
        // auth()->user()->voteFor($link); //voted
        // $user = auth()->user();

        // if($user->votedFor($link))
        // {
        //     $user->unvoteFor($link);
        // }
        // else
        // {
        //     $user->voteFor($link);
        // }

        auth()->user()->toggleVoteFor($link);


        return back();
    }
}
