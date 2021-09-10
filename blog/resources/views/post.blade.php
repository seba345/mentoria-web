@extends('layout')

@section('content')
<p><a href="/category/{{$post->category->slug}}" >
                {{ $post->category->name }}
                </a> 
    </p>
        <article>   
            <p>{{ $post->body }}</p>
        </article>
    <a href="/">Home</a>
    @endsection