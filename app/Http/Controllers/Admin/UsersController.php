<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));

    }

    public function show(User $user)
    {
        $phrase=Item::PhraseRand();

        $userItemsWatched = Item::ItemsPerUser($user->id);

        $items=DB::table('items')->where('user_id', $user->id)->get();

        return view('admin.users.show', compact('user','phrase', 'items', 'userItemsWatched'));
    }

    public function edit(User $user)
    {

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {

        $user->update($request->validated());

        return back()->withFlash('Usuario actualizado');
    }

    public function destroy(User $user)
    {

        $user->delete();

        return redirect()->back();
    }
}
