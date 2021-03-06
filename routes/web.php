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


Route::get('/articles', 'App\Http\Controllers\ArticlesController@index')->name('articles.index');
Route::post('/articles', 'App\Http\Controllers\ArticlesController@store');
// Order matters, becareful of the wildcard
Route::get('/articles/create', 'App\Http\Controllers\ArticlesController@create');
Route::get('/articles/{article}', 'App\Http\Controllers\ArticlesController@show')->name('articles.show');
Route::get('/articles/{article}/edit', 'App\Http\Controllers\ArticlesController@edit');
Route::put('/articles/{article}', 'App\Http\Controllers\ArticlesController@update');


