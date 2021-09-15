@extends('layout')

@section('content')
    @foreach ($posts as $post)
        <article>   
        <h1>
            <a href="/post/<?= $post->slug ?>"> 
                {{ $post->title }}
                </a> 
    </h1>    
    <p>
        by <a href="#">Juan Perez</a> in   
        <a href="/category/{{$post->category->slug}}" >
                {{ $post->category->name }}
                </a> 
    </p>
            <p>{{ $post->resumen }}</p>
        </article>
        @endforeach
@endsection