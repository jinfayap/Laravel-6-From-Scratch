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

Route::get('/posts/{post}', 'App\Http\Controllers\PostsController@show');
// Route::get('/posts/{post}', [PostsController::class, 'show']);


