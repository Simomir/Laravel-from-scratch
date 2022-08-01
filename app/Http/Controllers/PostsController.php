<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show($post) {
        $posts = [
            'first-post' => 'Hello, this is my first blog posts',
            'second-post' => 'Second post'
        ];

        if (!array_key_exists($post, $posts)) {
            abort(404, 'Sorry that post was not found');
        }

        return view('post', ['post' => $posts[$post]]);
    }
}
