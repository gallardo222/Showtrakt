<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'custom_title'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function posts()
    {
        return $this->hasMany('App\Posts', 'author_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comments', 'from_user');
    }

    public static function isAdmin()
    {
        if (Auth::user()->admin == 1)
        {
           return true;
        }
        return false;
    }

    public static function topUsers()
    {
        $users= DB::select("SELECT user_id FROM items GROUP BY user_id ORDER BY count(*) DESC LIMIT 9");

        foreach ($users as $user => $position)
        {
            if ($position->user_id == Auth::id())
            {
                return $user;
            }
        }

    }

    public static function topUsersTv()
    {
        $users= DB::select("SELECT user_id FROM items WHERE media_type='tv' GROUP BY user_id ORDER BY count(*) DESC LIMIT 9");

        foreach ($users as $user => $position)
        {
            if ($position->user_id == Auth::id())
            {
                return $user;
            }
        }

    }

    public static function topUsersMovies()
    {
        $users= DB::select("SELECT user_id FROM items WHERE media_type='movie' GROUP BY user_id ORDER BY count(*) DESC LIMIT 9");

        foreach ($users as $user => $position)
        {
            if ($position->user_id == Auth::id())
            {
                return $user;
            }
        }

    }


}
