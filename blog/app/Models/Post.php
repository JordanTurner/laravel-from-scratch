<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;


class Post
{
    public function __construct(public string $title, public string $excerpt, public string $date, public string $body, public string $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all()
    {
        return cache()->rememberForever('posts.all', function()
        {
            return collect(File::files(resource_path("posts")))//get all files in resources/posts
            ->map(fn($file) => YamlFrontMatter::parseFile($file))//for each file, parse into Yaml doc
            ->map(fn($document) => new Post(//use the yaml properties for each to create a new post object
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug,
                ))
            ->sortByDesc('date');
        });

    }

    public static function findOrFail($slug)
    {
        // of all the posts, find the one with a slug that matches the one that was requested.
        $post = static::all()->firstWhere('slug', $slug);

        if(!$post)//no matching post found - show 404
        {
            throw new ModelNotFoundException();
        }

        return $post;
    }
}