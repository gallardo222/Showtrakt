<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Item;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {

        $totalusers=User::count();
        $totalitems = Item::TotalItems();
        $comments=Comment::all()->sortByDesc('created_at')->take(10);
        $totalcomments=Comment::count();



        //dd($totalusers);

        return view('admin.dashboard')->with('item', $totalitems)->with('user', $totalusers)->with('comments', $comments)->with('totalcomments', $totalcomments);
    }
}
