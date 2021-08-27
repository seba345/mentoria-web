@extends('layout')

@section('content')
        <article>   
            <p><?= $post->body ?></p>
        </article>
    <a href="/">Home</a>
    @endsection