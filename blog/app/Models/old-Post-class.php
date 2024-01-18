<?php

namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public function __construct(public $title, public $excerpt, public $date, public $body, public $slug)
    {
        $this->title = $title;

        $this->excerpt = $excerpt;

        $this->date = $date;

        $this->body = $body;

        $this->slug = $slug;
    }


    public static function all()
    {
        return cache()->rememberForever('posts.all', function(){ // cache the results of this method forever. Give it a key of posts.all that can be refereneced later on to clear the cache

            return collect(File::files(resource_path("posts"))) // create a collection of files
            ->map(fn($file) => YamlFrontMatter::parseFile($file)) // map over the collection of files and parse each file as a YamlFrontMatter object
            ->map(fn($document) => // map over the collection of YamlFrontMatter objects and create a new Post object from each. The end result is a collection of Post objects
        
                new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug
                )
            )
            ->sortByDesc('date'); 
        });
    }

    public static function find($slug)
    {
        // all() method returns a collection of Post objects
        // firstWhere() method returns the first Post object that matches the slug
        // if no matching post is found, null is returned

        return static::all()->firstWhere('slug', $slug);
    }

    public static function findOrFail($slug)
    {
        // defer to the find() method to find the post

        $post = static::find($slug);

        if(! $post) // if no post is found, throw an exception
        {
            throw new ModelNotFoundException();
        }

        return $post; // if a post is found, return it
    }
}
