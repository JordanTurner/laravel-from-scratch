<!-- refrence our layout file (layout.blade.php) -->
@extends('layout')


<!-- the section here is named 'content', which is also refereneced in our layout file using @yield('content') -->
@section('content')

    <!-- the @command is a laravel directive, which is a php function that is specific to laravel and makes code cleaner/more readable. This code is 
    compiled into php and then sent to the browser. -->
    @foreach($posts AS $post)
        <article>

            <h1>
                <!-- double curly braces are used to echo out the value of a variable in laravel -->
                <a href="posts/{{ $post->id }}">{{ $post->title }}</a>
            </h1>

            <p>{{ $post->excerpt }}</p>

        </article>
    
    @endforeach

@endsection