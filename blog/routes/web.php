<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function ()
{
    // return a view called "posts" and pass the posts (collection of Post objects) to the view (posts.blade.php)

    return view('posts', [
        'posts' => Post::all()
    ]);    

});

// curly brackets are used to indicate a dynamic route (wildcard)
// we can then pass the wildcard as a variable to the function
Route::get('posts/{post}', function($slug)
{
    // find a post by its slug and pass it to a view called "post"

    /* 
        you can pass a second argument to the view. The find method on the Post class will return the data for the requested post, 
        which allows us to create a variable called $post and make it available on the post view
    */
    
    /*
        we could possibly use something similar for courses in the VT system. Whenever a user is visits course/something we could 
        use the something as a wildcard and then use the something to find the course in the database and then pass the course to the view
    */

    return view('post', [
        'post' => Post::find($slug)
        ]
    );

})->where('post', '[A-z_\-]+');
