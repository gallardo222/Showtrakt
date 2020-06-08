<?php

namespace App\Console\Commands;

use App\Comment;
use App\Item;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class TotalStats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'showtrakt:stats';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send stats of all activity to Telegram Channel, twice a day';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $user= new User();
        $totalusers=User::count();
        $totalitems = Item::TotalItems();
        $totalcomments=Comment::count();

        $topmovies= DB::select("SELECT title FROM items WHERE media_type='movie' GROUP BY title ORDER BY count(*) DESC LIMIT 3");
        $toptvshows= DB::select("SELECT title FROM items WHERE media_type='tv' GROUP BY title ORDER BY count(*) DESC LIMIT 3");

        $stats= [
            'totalusers' => $totalusers,
            'totalitems' => $totalitems,
            'totalcomments' => $totalcomments,
            'topmovies' => $topmovies,
            'topshows' => $toptvshows,
        ];
        $user->stats = $stats;

        $user->notify(new \App\Notifications\TotalStats($stats));


    }
}
