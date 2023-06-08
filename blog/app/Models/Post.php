<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'excerpt', 'body', 'slug', 'category_id'];

    protected $with = ['category', 'author'];

    //eloquent relationship. A post "belongsTo" a single category in this blog
    public function category()
    {
        /* a post in the database has a category_id column. With this eloquent relationship method we can point to the Category model
            and access the other propeties via the id. So we could do something like $post->category->name to access the name of the category. 
            Note that it should not be called as a method e.g $post->category() as this will return a belongsTo instance. Instead it should be accessed as a property
            of the post $post->category and Laravel uses magic accessers to load the corresponding category*/
        return $this->belongsTo(Category::class);
    }


    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
