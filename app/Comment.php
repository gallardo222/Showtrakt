<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['body', 'item_id', 'user_id', 'item_title', 'media_type'];

    public function author()
    {
        return $this->belongsTo('App\User');
    }
}
