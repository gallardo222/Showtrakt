<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Episode extends Model
{
    public static function EpisodeExist($data1, $data2)
    {
        $match=['user_id' => $data1, 'episode_tmdb_id' => $data2];
        $episode= DB::table('episodes')->where($match)->first();

        return $episode;
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'tmdb_id', 'tmdb_id');
    }


}
