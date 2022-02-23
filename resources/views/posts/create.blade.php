@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/posts" method="POST">
        @csrf
        <input type="text" name="title">
        <input type="textarea" name="content">
        <input type="submit" value="">
    </form>
</div>