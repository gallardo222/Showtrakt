<?php

namespace App\Http\Controllers\Admin;

use App\Invite;
use App\Notifications\InviteNotification;
use App\User;
use App\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));

    }

    public function invite()
    {
        return view('admin.users.invite');
    }

    public function process_invites(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email'
        ]);
        /* after first validation, look up for email and add a custom error*/
        $validator->after(function ($validator) use ($request) {
            if (Invite::where('email', $request->input('email'))->exists()) {
                $validator->errors()->add('email', 'There exists an invite with this email!');
            }
        });
        /* return errors if validator fails*/
        if ($validator->fails()) {
            return redirect(route('admin.users.invite'))
                ->withErrors($validator)
                ->withInput();
        }
        /*Create a unique token and sign the URL to make it unique, available only for 300 minutes*/
        do {
            $token = Str::random(20);
        } while (Invite::where('token', $token)->first());
        Invite::create([
            'token' => $token,
            'email' => $request->input('email')
        ]);

        $url = URL::temporarySignedRoute(

            'registration', now()->addMinutes(300), ['token' => $token]
        );

        Notification::route('mail', $request->input('email'))->notify(new InviteNotification($url));

        return redirect('/admin/users')->with('success', 'The Invite has been sent successfully');
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
