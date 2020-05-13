<?php

namespace App\Http\Controllers;

use App\TMDB;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function show()
    {
        $user=User::find(Auth::id());
        $items=DB::table('items')->where('user_id', $user->id)->get();
//dd($items);
        return view('profiles.show')->with('user', $user)->with('items',$items);
    }
}
