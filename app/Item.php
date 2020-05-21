<?php

namespace App;
use App\TMDB;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Array_;
use Symfony\Component\Finder\Finder;

class Item extends Model
{
    protected $fillable = ['title', 'tmdb_id', 'user_id', 'poster', 'media_type'];

    private $tmdb;
    private $client;

    public function __construct(TMDB $tmdb)
    {

        $this->tmdb = $tmdb;

    }

    public function item($tmdbId, $mediaType)
    {

        $found = $this->tmdb->details($tmdbId, $mediaType);

        if( ! (array) $found) {
            return response('Not found', Response::HTTP_NOT_FOUND);
        }

        $item = $this->tmdb->createItem($found, $mediaType);

        return $item;
    }

    public function ItemEpisode($data1, $data2)
    {
        $item= $this->tmdb->tvEpisodes($data1,$data2);
        return $item;
    }

    public static function ItemExist($data1, $data2)
    {
        $match=['user_id' => $data1, 'tmdb_id' => $data2];
        $item= DB::table('items')->where($match)->first();

        return $item;
    }

    public static function ItemWatched($data1, $data2, $data3)
    {
        $match=['user_id' => $data1, 'tmdb_id' => $data2, 'watched' => $data3];
        $item= DB::table('items')->where($match)->first();

        return $item;
    }

    public static function ItemWatchlist($data1, $data2, $data3)
    {
        $match=['user_id' => $data1, 'tmdb_id' => $data2, 'watchlist' => $data3];
        $item= DB::table('items')->where($match)->first();

        return $item;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function search($title)
    {

        $item= $this->tmdb->search($title);

        return $item;
    }

    public static function PhraseRand()
    {
        $phrases=[
          'Why so serious?', 'I\'m going to make him an offer he can\'t refuse', 'May the Force be with you',
            'You talking to me?', 'I love the smell of napalm in the morning', 'Show me the money!', 'You can\'t handle the truth!',
            'I\'ll be back', 'Carpe diem. Seize the day, boys. Make your lives extraordinary', 'How you doin\'?', 'It\'s gonna be legen — wait for it — dary.',
            'Oh, my God! They killed Kenny!',
        ];
        $phrase=Arr::random($phrases, 1);

        return $phrase;


    }

    public static function ItemsPerUser($id)
    {

        $showswatched= DB::table('items')->where('user_id', $id)->where('watched' , 1)->where('media_type', 'tv')->select('id')->count('id');
        $showswatchlist= DB::table('items')->where('user_id', $id)->where('watchlist' , 1)->where('media_type', 'tv')->select('id')->count('id');
        $moviesswatched= DB::table('items')->where('user_id', $id)->where('watched' , 1)->where('media_type', 'movie')->select('id')->count('id');
        $moviesswatchlist= DB::table('items')->where('user_id', $id)->where('watchlist' , 1)->where('media_type', 'movie')->select('id')->count('id');

        $itemsPerUser= [

        'showswatched' => $showswatched,
        'showswatchlist' => $showswatchlist,
        'moviesswatched' => $moviesswatched,
        'moviesswatchlist' => $moviesswatchlist

        ];

        return $itemsPerUser;
    }

    public static function TotalItems()
    {

        $showswatched= DB::table('items')->where('watched' , 1)->where('media_type', 'tv')->select('id')->count('id');
        $moviesswatched= DB::table('items')->where('watched' , 1)->where('media_type', 'movie')->select('id')->count('id');

        $totalitems= [

            'showswatched' => $showswatched,
            'moviesswatched' => $moviesswatched,

        ];

        return $totalitems;
    }

}
