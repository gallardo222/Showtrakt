<?php

namespace App;
use App\TMDB;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

}
