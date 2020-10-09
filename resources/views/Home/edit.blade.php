@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('inc.nav')
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Edit Post</div>
                    <div class="card-body">
                        <form method="post" action="{{route('edit-post')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{$post->id}}" name="id">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" id="title" name="title" value="{{$post->title}}" class="form-control">
                            </div>
                            <label for="text">Post Body</label>
                            <div class="form-group">
                                <textarea class="ckeditor form-control" id="text" name="body">
                                    {{$post->body}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Thumbnail</label><br>
                                <img src="{{url('/storage/thumbnails/').'/'.$post->thumbnail}}" class="mb-4" width="100" alt="">
                                <input type="file" id="image" name="thumbnail" class="form-control">
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary">Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
