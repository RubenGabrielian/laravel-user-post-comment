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
                <div class="row posts mt-5">
                    @foreach($posts as $post)
                        <div class="col-md-12">
                            <h5>{{$post->title}}</h5>
                            <div>{!! $post->body !!}</div>
                            <img src="{{url('/storage/thumbnails/').'/'.$post->thumbnail}}" width="100%" alt="">
                            <p class="mt-3">
                                <a href="{{route('edit',['id' => $post->id])}}" class="btn btn-warning">Edit</a>
                                <a href="{{route('delete',['id' => $post->id])}}" class="btn btn-danger">Delete</a>
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
