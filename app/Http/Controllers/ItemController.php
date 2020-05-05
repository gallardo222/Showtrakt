<?php

namespace App\Http\Controllers;

use App\Item;
use App\Item\Model;

class ItemController extends Controller
{

    public function item($tmdbId, $mediaType, Item $item)
    {

        $item=$item->item($tmdbId,$mediaType);
        //dd($item);
        return view('items.show')->with('item', $item);
    }


    public function store($data, Item $item)
    {
        dd($data);
        return $this->firstOrCreate([
            'tmdb_id' => $data['tmdb_id'],
            'media_type' => $data['media_type'],
        ], [
            'title' => $data['title'],
            'original_title' => $data['original_title'],
            'poster' => $data['poster'] ?? '',
            'rating' => 0,
            'released' => $data['released'],
            'released_timestamp' => Carbon::parse($data['released']),
            'overview' => $data['overview'],
            'backdrop' => $data['backdrop'],
            'tmdb_rating' => $data['tmdb_rating'],
            'imdb_id' => $data['imdb_id'],
            'imdb_rating' => $data['imdb_rating'],
            'youtube_key' => $data['youtube_key'],
            'last_seen_at' => now(),
            'slug' => $data['slug'],
            'homepage' => $data['homepage'] ?? null,
        ]);
    }
}
