<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();

        return view('admin.comments.index')->withComments($comments);
    }

    public function show(Comment $comment)
    {
        $phrase=Item::PhraseRand();

        return view('admin.comments.show', compact('comment','phrase'));
    }

    public function edit(Comment $comment)
    {

        return view('admin.comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {


        $comment->body = $request->input('body');
        $comment->save();

        return redirect('/admin/comment');
    }
    public function destroy(Comment $comment)
    {

        $comment->delete();

        return redirect()->back();
    }
}
