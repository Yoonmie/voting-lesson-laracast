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
                
                <ul class="list-group">
    
                    @if (count($links))
                    @foreach ($links as $link)
                        <li class="list-group-item">
                           
                            @auth
                                <form action="/votes/{{ $link->id }}" method="POST" style="display: inline-block">
                                    {{ csrf_field() }}
                                    
                                    <button class="btn mx-3 {{ Auth::check() && Auth::user()->votedFor($link) ? 'btn-success' : 'btn-white border' }}">
                                        {{ $link->votes->count() }}
                                    </button>
                                </form>
                            @endauth
                            
                
                            <a href="/community/{{ $link->channel->slug }}" class="label label-default mr-1 text-white" style="background: {{ $link->channel->color }}">{{ $link->channel->title }}</a>
                
                            <a href="{{ $link->link }}" target="_blank">
                                {{ $link-> title }}
                            </a>
                
                            <small>
                                Contributed by <a href="">{{ $link->creator->name }}</a> {{ $link->updated_at->diffForHumans() }}
                            </small>
                        </li>
                    @endforeach
                    
                    @else
                       <li class="Links_link">
                            No contributions yet
                        </li> 
                    @endif
                    
                </ul>
                {{-- <div class="my-3">
                    {{ $links -> links('vendor.pagination.simple-bootstrap-4') }}
                </div> --}}
                
                

            </div>
           @include('community.add-link')
       </div>
   {{-- </div> --}}
@endsection