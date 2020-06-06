<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Invite;
use App\Item;
use App\TMDB;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('registration_view');
    }
    public function show()
    {
        $user=User::find(Auth::id());
        $totalusers=User::count();
        $phrase=Item::PhraseRand();
        $comments=Comment::where('user_id', Auth::id())->orderByDesc('created_at')->take(10)->get();
        $userItemsWatched = Item::ItemsPerUser(Auth::id());
        $topusers= User::topUsers();
        $topusersMovie= User::topUsersMovies();
        $topusersTv= User::topUsersTv();

        $user->comments = $comments;
        $user->totalusers = $totalusers;
        $user->phrase = $phrase;
        $user->userItemsWatched = $userItemsWatched;
        $user->topusers = $topusers;
        $user->topusersMovie = $topusersMovie;
        $user->topusersTv = $topusersTv;

        //dd($user);



        $items=DB::table('items')->where('user_id', $user->id)->get();

        return view('profiles.show')->with('user', $user)->with('items',$items);
    }

    public function registration_view($token)
    {
        $invite = Invite::where('token', $token)->first();
        return view('auth.register',['invite' => $invite]);
    }

    public function update_avatar(Request $request){

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars',$avatarName);

        $user->avatar = $avatarName;
        $user->save();

        return back()
            ->with('success','You have successfully upload image.');

    }
}
