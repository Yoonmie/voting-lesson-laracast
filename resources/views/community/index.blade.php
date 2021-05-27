@extends('layouts.app')
@section('content')
   {{-- <div class="container"> --}}
       <div class="form-group">
            <div class="d-inline p-2 "> <a href="{{ request()->url() }}">Recent Posts</a></div>|
            <div class="d-inline p-2"><a href="{{ url('/popular') }}">Popular Post</a></div>
       </div>
    
       <div class="row">
            <div class="col-md-8">
                <a href="/community"><h1>Community</h1></a>

                @if ($channel->exists)
                <span>&mdash; {{ $channel->slug }}</span>
                    
                @endif

                @include('community.list')
                {{-- @include('community.popular') --}}
            </div>
           @include('community.add-link')
       </div>
   {{-- </div> --}}
@endsection