<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Can make use of 'php artisan make:controller PostsController' to generate the controller file
 

class PostsController extends Controller
{
    public function show($slug) {
        $post = \DB::table('posts')->where('slug', $slug)->first();
        
        return view('post', [
            'post' => $post
        ]);
    }
}
