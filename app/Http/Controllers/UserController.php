<?php

namespace App\Http\Controllers;

use App\Item;
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
        $totalusers=User::count();
        $phrase=Item::PhraseRand();
        $userItemsWatched = Item::ItemsPerUser(Auth::id());

        $user->totalusers = $totalusers;
        $user->phrase = $phrase;
        $user->userItemsWatched = $userItemsWatched;
        //dd($user);
        $items=DB::table('items')->where('user_id', $user->id)->get();

        return view('profiles.show')->with('user', $user)->with('items',$items);
    }
}
