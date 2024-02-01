<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;


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
    // to see the sql queries that are being run, use the following code
    // this will highlight the n+1 problem
    // \Illuminate\Support\Facades\DB::listen(function($query)
    // {
    //     logger($query->sql, $query->bindings);
    // });

    // return a view called "posts" and pass the posts (collection of Post objects) to the view (posts.blade.php)
    return view('posts', [
        'posts' => Post::latest()->get() // eager load the category relationship        
    ]);    

});


// using Route Model Binding. Type hint a Post object and Laravel will automatically fetch the post from the database
Route::get('posts/{post:slug}', function(Post $post) // find the post where the slug matches the wildcard in the url
{
    return view('post', [
        'post' => $post
        ]
    );
    // find a post by its id and pass it to a view called "post"

    // return view('post', [
    //     'post' => Post::findOrFail($id) //find post matching the id or throw an exception (404)
    //     ]
    // );

});

Route::get('categories/{category:slug}', function (Category $category)
{
    \Illuminate\Support\Facades\DB::listen(function($query)
    {
    logger($query->sql, $query->bindings);
    });

    return view('posts', [
        'posts' => $category->posts
        ]
    );

});

Route::get('authors/{author:username}', function (User $author)
{
    //ddd($author);
    return view('posts', [
        'posts' => $author->posts
        ]
    );

});

// curly brackets are used to indicate a dynamic route (wildcard)
// we can then pass the wildcard as a variable to the function
// Route::get('posts/{post}', function($slug)
// {
//     // find a post by its slug and pass it to a view called "post"

//     /* 
//         you can pass a second argument to the view. The find method on the Post class will return the data for the requested post, 
//         which allows us to create a variable called $post and make it available on the post view
//     */
    
//     /*
//         we could possibly use something similar for courses in the VT system. Whenever a user is visits course/something we could 
//         use the something as a wildcard and then use the something to find the course in the database and then pass the course to the view
//     */

//     return view('post', [
//         'post' => Post::findOrFail($slug) //find post matching the slug or throw an exception (404)
//         ]
//     );

// });
