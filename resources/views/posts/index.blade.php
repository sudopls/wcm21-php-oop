@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Posts</h2>
    @if(count($posts) > 1)
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-4">
                <h3><a href="/posts/{{$post->id}}">{{ $post->title }}</a></h3>
                <h2>{{ $post->user->name }}</h2>

                <!-- Check if post ID == user ID -->
                @if($post->user_id == auth()->id())
                    <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit post</a>
                @endif
            </div>
        @endforeach
    @else
        <p>No posts found!</p>
    @endif
</div>
@endsection