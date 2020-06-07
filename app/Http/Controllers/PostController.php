<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(5);
        //dd($posts);

        return view('posts.index')->withPosts($posts);
    }

    public function show($slug)
    {
        $post = Post::where('slug',$slug)->first();
        if(!$post)
        {
            return redirect('/')->withErrors('requested page not found');
        }

        return view('posts.show')->withPost($post);
    }
}
