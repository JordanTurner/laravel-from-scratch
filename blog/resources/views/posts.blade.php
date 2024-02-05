<!-- refrence our layout file (layout.blade.php) -->
@extends('layout')


<!-- the section here is named 'content', which is also refereneced in our layout file using @yield('content') -->
@section('content')

<!-- include the _posts-header.blade.php file. Partials are prefixed with an underscore -->
@include('_posts-header') 

<main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

    @if ($posts->count())

        @component('components.post-featured-card', ['post' => $posts[0]])
        @endcomponent

        @if ($posts->count() > 1)
            <div class="lg:grid lg:grid-cols-2">

                @foreach($posts->skip(1) AS $post)
                    @component('components.post-card', ['post' => $post], class="bg-red-500")
                    @endcomponent
                @endforeach
        @endif

    @else
        <p class="text-center">No posts yet. Please check back later.</p>
    @endif

        </div>
</main>

    <!-- the @command is a laravel directive, which is a php function that is specific to laravel and makes code cleaner/more readable. This code is compiled into php and then sent to the browser. -->
    <!-- @foreach($posts AS $post)
        <article>

            <h1> -->
                <!-- double curly braces are used to echo out the value of a variable in laravel -->
                <!-- <a href="posts/{{ $post->slug }}">{{ $post->title }}</a>
            </h1> -->

            <!-- <p>
                By <a href="authors/{{ $post->author->id}}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
            </p> -->
            <!-- @component('components.author_category', ['post' => $post])
            @endcomponent

            <div>
                {{ $post->excerpt }}
            </div>

        </article>
    
    @endforeach -->

@endsection