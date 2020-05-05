<?php

namespace App;
use App\TMDB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
    public function create($data)
    {
        DB::beginTransaction();

        //$data = $this->makeDataComplete($data);

        $item = $this->store($data);

        //$this->episodeService->create($item);
        //$this->genreService->sync($item, $data['genre_ids'] ?? []);
        //$this->alternativeTitleService->create($item);

        //$this->storage->downloadImages($item->poster, $item->backdrop);

        DB::commit();

        return $item->fresh();
    }







}
