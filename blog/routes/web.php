<?php

use App\Models\Post;
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
    $posts = Post::all();//returns all posts as a collection

    //load posts view and pass the posts collection
    return view('posts', [
        'posts' => $posts
    ]);
});

Route::get('posts/{post}', function($slug)//when visiting posts/something, pass the something to the funciton
{   
    $post = Post::findOrFail($slug);
    //load the post view (post.blade.php) and pass the matching post to the view
    return view('post', [
        'post' => $post
    ]);

});