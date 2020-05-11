<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{


    public function item()
    {
        return $this->belongsTo(Item::class, 'tmdb_id', 'tmdb_id');
    }


}
