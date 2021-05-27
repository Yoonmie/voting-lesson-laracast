<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\CommunityLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComminityLinksController extends Controller
{
    public function index()
    {
        $links = CommunityLink::where('approved', 1)->paginate(5);
        $channels = Channel::orderBy('title', 'asc')->get();
        return view('community.index', compact('links', 'channels'));
    }

    public function store(Request $request)
    {
        // $request->user_id = Auth::id();
        // CommunityLink::create($request->all());

        $this->validate($request, [
            'channel_id' => 'required|exists:channels,id',
            'title' => 'required',
            'link' => 'required|active_url|unique:community_links'
        ]);

       CommunityLink::from(auth()->user())->contribute($request->all());//save data

        if(auth()->user()->isTrusted())
        {
            flash('Thanks for the contribution','success');
        }
        else{
            flash('This contribution will be approved shortly.Thanks!','info');
            // flash()->overlay('This contribution will be approved shortly', 'Thanks!');
            // flash()->overlay('This contribution will be approved shortly','Thanks!');
        }
       return back();
    }
}
