@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/posts" method="POST">
        @csrf
        <input type="text" name="title">
        <input type="textarea" name="content">

        <h3>Tag your post!</h3>

        <select class="form-select" name="tags[]" multiple="multiple">
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->title }}</option>
            @endforeach
        </select>

        <input type="submit" value="Submit">
    </form>
</div>

@endsection