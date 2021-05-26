<?php

namespace App\Http\Controllers;

use App\Models\CommunityLink;
use Illuminate\Http\Request;

class ComminityLinksController extends Controller
{
    public function index()
    {
        $links = CommunityLink::paginate(20);
        return view('community.index', compact('links'));
    }
}
