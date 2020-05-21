<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Episode extends Model
{
    public static function EpisodeExist($data1, $data2)
    {
        $match=['user_id' => $data1, 'episode_tmdb_id' => $data2];
        $episode= DB::table('episodes')->select('episode_tmdb_id')->where($match)->first();

        return $episode;
    }

    public function ImageExist($url)
    {
        $array = @get_headers($url);

        $string = $array[0];

        if(strpos($string, "404")) {
            return false;
        }

        return true;
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'tmdb_id', 'tmdb_id');
    }


}
