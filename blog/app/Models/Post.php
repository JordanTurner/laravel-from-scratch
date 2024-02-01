<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // the fillable property is used to specify which attributes can be mass assigned
    protected $fillable =
    [
        'title',
        'slug',
        'excerpt',
        'body',
        'category_id'
    ];

    protected $with = ['category', 'author']; // eager load the category and author relationships every time a post is retrieved from the database

    public function category()
    {

        // hasOne, hasMany, belongsTo, belongsToMany
        // a post belongs to a category

        return $this->belongsTo(Category::class);

    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // the getRouteKeyName method is used to specify which attribute should be used to retrieve a modelinstance
    // in this case we are using the slug attribute, but the id attribute is used by default
    // this method is used in the route model binding in routes/web.php
    // but in this app, based on the laracasts video, we are specifying the attribute (slug) in the route model binding in routes/web.php uri e.g. Route::get('posts/{post:slug}'


    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }


}
