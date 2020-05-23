<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, ['body' => 'required','tmdb_id' => 'required' ]);

        //dd($request->all());

        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user_id = auth()->user()->id;
        $comment->item_id = $request->tmdb_id;
        $comment->save();

        return redirect()->back();
    }

    public function destroy(Comment $comment)
    {

        $comment->delete();

        return redirect()->back();
    }

}
