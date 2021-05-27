@if(Auth::check())
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
                        @foreach ($channels as $channel)
                            <option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : '' }}>{{ $channel->title }}</option>
                        @endforeach
                        
                       
                    </select>
                </div>

                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" id="title" class="form-control @error('title') border-danger @enderror" value="{{ old('title') }}" name="title" placeholder="What is the title of the article?">
                    {!! $errors->first('title', '<span class="Error text-danger">:message</span>') !!}
                </div>

                <div class="form-group">
                    <label for="link">Link:</label>
                    <input type="text" id="link" class="form-control" name="link" placeholder="What is the URL?">
                    {!! $errors->first('link', '<span class="Error">:message</span>') !!}
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Contribute A Link</button>
                </div>
            </form>
        </div>
    </div>
</div>
@else
<div class="col-md-4">
    <h3>Please Log In</h3>
</div>   
@endif