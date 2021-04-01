<?php

use App\Http\Controllers\PostsController;
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

// Laravel 6 - Route::get('/posts/{post}', 'PostsController@show');
// But Laravel 8 change format to Route::get('/posts/{post}', 'App\Http\Controllers\PostsController@show');
// Route::get('/posts/{post}', 'App\Http\Controllers\PostsController@show');
// Alternative syntax - Route::get('/posts/{post}', [PostsController::class, 'show']);

Route::get('/', function() {
    return view('welcome');
});

Route::get('/contact', function() {
    return view('contact');
});

Route::get('/about', function() {
    $article = App\Models\Article::take(3)->latest()->get();

    return view('about', [
        'articles' => $article
    ]);
});


Route::get('/articles', 'App\Http\Controllers\ArticlesController@index');
Route::post('/articles', 'App\Http\Controllers\ArticlesController@store');
// Order matters, becareful of the wildcard
Route::get('/articles/create', 'App\Http\Controllers\ArticlesController@create');
Route::get('/articles/{article}', 'App\Http\Controllers\ArticlesController@show');
Route::get('/articles/{article}/edit', 'App\Http\Controllers\ArticlesController@edit');
Route::put('/articles/{article}', 'App\Http\Controllers\ArticlesController@update');



Route::get('/posts/{post}', 'App\Http\Controllers\PostsController@show');
// Route::get('/posts/{post}', [PostsController::class, 'show']);


// GET /articles
// GET /articles/:id

// POST /articles
// PUT /articles/:id
// DELETE /articles/:id

// GET, POST, PUT, DELETE


// GET /videos
// GET /videos/create
// POST /videos
// GET /videos/2
// GET /videos/2/edit
// PUT /videos/2/
// DELETE /videos/2/

// GET /videos/subscribe

// POST /videos/subscriptions => VideoSubscriptionsController 
