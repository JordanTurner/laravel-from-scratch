@extends('layout')

@section('content')

    <article>

        <h1>{{ $post->title }}</h1>

        <!-- <p>
            By <a href="#">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
        </p> -->
        @component('components.author_category', ['post' => $post])
        @endcomponent

        <div>
            <!-- curly braces with two exclamation marks will not escape the HTML - it will be rendered as HTML -->
            {!! $post->body !!}
        </div>

    </article>

    <a href="/">Go Back</a>

@endsection