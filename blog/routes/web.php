<?php

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function ()
{
    //$posts = Post::all();//returns all posts as a collection

    // \Illuminate\Support\Facades\DB::listen(function($query){
    //     logger($query->sql, $query->bindings);
    // });

    //load posts view and pass the posts collection
    return view('posts', [
        'posts' => Post::latest()->with('category', 'author')->get()//returns all posts as a collection
    ]);
});

/*Type hinting the Post model here is known as "Route Model Binding". To do this the wildcard name has to match the variable name e.g. {post} and $post
and then Laravel knows that you are trying to load the corresponding post by it's default key (id) e.g find the post with the given id
*/
Route::get('posts/{post:slug}', function(Post $post)//when visiting posts/something, pass the something to the funciton
{
    //load the post view (post.blade.php) and pass the matching post to the view
    return view('post', [
        'post' => $post
    ]);

});

Route::get('categories/{category:slug}', function(Category $category){

    return view('posts', [
        'posts' => $category->posts
    ]);

});

Route::get('authors/{author:username}', function(User $author){

    return view('posts', [
        'posts' => $author->posts
    ]);

});