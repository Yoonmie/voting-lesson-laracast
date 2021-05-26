@extends('layouts.app')
@section('content')
   <div class="container">
       <div class="row">
            <div class="col-md-8">
                <h1>Community</h1>

                <ul class="Links">

                </ul>

                @foreach ($links as $link)
                    <li class="Links_link">
                        <a href="{{ $link->link }}" target="_blank">
                            {{ $link-> title }}
                        </a>

                        <small>
                            Contributed by <a href="">{{ $link->creator->name }}</a> {{ $link->updated_at->diffForHumans() }}
                        </small>
                    </li>
                @endforeach
            </div>
            <div class="col-md-4">
                <h3>Contribute A Link</h3>

                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="/community" >
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="channel">Channel</label>
                                <select class="form-control" name="channel_id">
                                    <option selected disable>Pick a Channel....</option>
                                    <option value="1">PHP</option>
                                    <option value="2">JavaScript</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" id="title" class="form-control" name="title" placeholder="What is the title of the article?">
                            </div>
                            <div class="form-group">
                                <label for="link">Link:</label>
                                <input type="text" id="link" class="form-control" name="link" placeholder="What is the URL?">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Contribute A Link</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
       </div>
   </div>
@endsection