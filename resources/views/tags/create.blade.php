@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create a new tag</h2>
    <form action="/tags" method="POST">
        @csrf
        <input type="text" name="title">
        <input type="submit" value="">
    </form>
</div>
@endsection