<?php

use Illuminate\Support\Facades\Route;

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

/* 
    Wild card in {post}
    Access wild card in the function callback.

    Check 1array_key_exists to abort to 404 page (preferred)
    or alternative return it as 
    return view('post', [
        'post' => $posts[$post] ?? 'Message here'
    ]);

*/
Route::get('/posts/{post}', function ($post) {
    $posts = [
        'my-first-post' => 'Hello, this is my first blog post!',
        'my-second-post' => 'Now I am getting the hang of this blogging thing.'
    ];

    if(!array_key_exists($post, $posts)) {
        abort(404, 'Sorry, that post was not found');
    }
    return view('post', [
        'post' => $posts[$post] 
    ]);
});


