@extends('layout')

@section('content')

    <article>
        <h1>{{ $post->title }}</h1>
        <div>
            <!-- curly braces with two exclamation marks will not escape the HTML - it will be rendered as HTML -->
            {!! $post->body !!}
        </div>

    </article>

    <a href="/">Go Back</a>

@endsection