<?php

namespace App\Http\Controllers;

use App\Models\CommunityLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComminityLinksController extends Controller
{
    public function index()
    {
        $links = CommunityLink::paginate(5);
        return view('community.index', compact('links'));
    }

    public function store(Request $request)
    {
        // $request->user_id = Auth::id();
        // CommunityLink::create($request->all());

       CommunityLink::from(auth()->user())->contribute($request->all());
       return back();
    }
}
