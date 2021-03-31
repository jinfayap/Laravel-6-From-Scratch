<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use DB; // otherwise need providea backslash \DB::table
// Can make use of 'php artisan make:controller PostsController' to generate the controller file
 

class PostsController extends Controller
{
    public function show($slug) {

        // $post = DB::table('posts')->where('slug', $slug)->first();
        
        // $post = Post::where('slug', $slug)->firstOrFail();

        return view('post', [
            'post' => Post::where('slug', $slug)->firstOrFail()
        ]);
    }
}
