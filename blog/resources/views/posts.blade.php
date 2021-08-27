@extends('layout')

@section('content')
    @foreach ($posts as $post)
        <article>   
        <h1>
            <a href="/post/<?= $post->slug ?>"> 
                <?= $post->title ?>
                </a>
    </h1>    
            <p><?= $post->resumen ?></p>
        </article>
        @endforeach
@endsection