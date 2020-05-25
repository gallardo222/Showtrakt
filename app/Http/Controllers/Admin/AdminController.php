<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Item;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {

        $totalusers=User::count();
        $totalitems = Item::TotalItems();
        $comments=Comment::all()->sortByDesc('created_at')->take(10);
        $totalcomments=Comment::count();
        $topmovies= DB::select("SELECT tmdb_id, poster FROM items WHERE media_type='movie' GROUP BY tmdb_id, poster ORDER BY count(*) DESC LIMIT 9");
        $toptvshows= DB::select("SELECT tmdb_id, poster FROM items WHERE media_type='tv' GROUP BY tmdb_id, poster ORDER BY count(*) DESC LIMIT 9");
        $topusers= DB::select("SELECT user_id FROM items GROUP BY user_id ORDER BY count(*) DESC LIMIT 9");
        //dd($topusers);
        return view('admin.dashboard')->with('item', $totalitems)
                ->with('user', $totalusers)
                ->with('comments', $comments)
                ->with('totalcomments', $totalcomments)
                ->with('topmovies', $topmovies)
                ->with('toptvshows', $toptvshows)
                ->with('topusers', $topusers);


    }
}
