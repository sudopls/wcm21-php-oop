@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit post</h1>

    <form action="{{ route('posts.update', ['post' => $post]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" value="{{ $post->title }}" placeholder="Title">
        </div>

        <div class="form-group">
            <label for="content">Content:</label>
            <textarea name="content" cols="30" rows="10" class="form-control" placeholder="Post content yada yada">{{ $post->content }}</textarea>
        </div>

        <input type="submit" value="Submit">
    </form>
</div>
@endsection