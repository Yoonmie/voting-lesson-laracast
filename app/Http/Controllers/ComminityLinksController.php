<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\CommunityLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComminityLinksController extends Controller
{
    public function index(Channel $channel)
    {
    //    $orderBy = request()->exists('popular') ? 'vote_count' : 'updated_at';

    //     $links = CommunityLink::with('creator', 'channel')
    //     ->withCount('votes')
    //     ->forChannel($channel)
    //     ->where('approved', 1)
    //     ->orderBy($orderBy, 'desc')
    //     ->paginate(3);

        $links = CommunityLink::with('votes')->forChannel($channel)
        ->where('approved', 1)
        ->latest('updated_at')
        ->paginate(5);

        $channels = Channel::orderBy('title', 'asc')->get();
        return view('community.index', compact('links', 'channels', 'channel'));
    }

    public function store(Request $request)
    {
        // $request->user_id = Auth::id();
        // CommunityLink::create($request->all());

        $this->validate($request, [
            'channel_id' => 'required|exists:channels,id',
            'title' => 'required',
            'link' => 'required|active_url',
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

    public function popular(Channel $channel)
    {
        // dd('hi');
        // $orderBy = request()->exists('popular') ? 'vote_count' : '';

        // $links = CommunityLink::with('creator', 'channel')
        // ->withCount('votes')
        // ->forChannel($channel)
        // ->where('approved', 1)
        // ->orderBy($orderBy, 'desc')
        // ->paginate(3);
        
        $links = CommunityLink::with('votes')->forChannel($channel)
        ->where('approved', 1)
        ->latest('updated_at')
        ->paginate(10);

        $links = $links->sortByDesc(function ($link){
            return $link->votes->count();
        });


        $channels = Channel::orderBy('title', 'asc')->get();
        return view('community.popular', compact('links', 'channels', 'channel'));
    }
}
