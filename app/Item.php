<?php

namespace App;
use App\TMDB;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    private $tmdb;

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
