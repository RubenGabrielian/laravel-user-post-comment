@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('inc.nav')
                <div class="row posts mt-5">
                    @foreach($posts as $post)
                        <div class="col-md-12 mb-3">
                            <h5>{{$post->title}}</h5>
                            <div>{!! $post->body !!}</div>
                            <img src="{{url('/storage/thumbnails/').'/'.$post->thumbnail}}" width="100%" alt="">
                            <div class="comments mt-2 mb-2">
                                <small><b>Comments</b></small>
                                @foreach($post->comments as $comment)
                                    <div class="comment-area">
                                        <div class="post-comment">{{$comment->comment}}</div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group mt-3">
                                <label for="comment">Add Comment</label>
                                <input type="text" id="comment" class="form-control comment">
                                <button  data-post="{{$post->id}}" class="btn btn-success mt-2 add_comment">Add Comment</button>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
