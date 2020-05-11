<?php

namespace App;
use App\TMDB;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
