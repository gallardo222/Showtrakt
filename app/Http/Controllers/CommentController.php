<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $comments= Comment::where('user_id', Auth::id())->paginate(10);

        return view('comments.index')->with('comments', $comments);
    }
    public function store(Request $request)
    {
        $this->validate($request, ['body' => 'required','tmdb_id' => 'required', 'item_title' => 'required', 'media_type' => 'required' ]);

        //dd($request->all());

        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user_id = auth()->user()->id;
        $comment->item_id = $request->tmdb_id;
        $comment->item_title = $request->item_title;
        $comment->media_type = $request->media_type;


        $comment->save();

        return redirect()->back();
    }

    public function destroy(Comment $comment)
    {

        $comment->delete();

        return redirect()->back();
    }

}
