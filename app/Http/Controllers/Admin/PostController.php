<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostFormRequest;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index')->withPosts($posts);
    }

    public function create(Request $request)
    {
        return view('admin.posts.create');

    }

    public function store(PostFormRequest $request)
    {
        $post = new Post();
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->image_url = $request->get('image_url');

        $post->slug = Str::slug($post->title);

        $duplicate = Post::where('slug', $post->slug)->first();

        if ($duplicate) {
            return redirect()->back()->withErrors('Title already exists.')->withInput();
        }

        $post->author_id = $request->user()->id;

        $post->save();

        return redirect('/admin/post');
    }

    public function edit(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('admin.posts.edit')->with('post', $post);
    }

    public function update(Request $request)
    {

        $post_id = $request->input('post_id');
        $post = Post::find($post_id);

        $title = $request->input('title');
        $slug = Str::slug($title);

        $post->slug = $slug;
        $post->title = $title;
        $post->body = $request->input('body');

        $post->save();

        return redirect('/admin/post');

    }

    public function destroy(Post $post)
    {

        $post->delete();

        return redirect()->back();
    }
}
