<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['body', 'item_id', 'user_id'];

    public function author()
    {
        return $this->belongsTo('App\User');
    }
}
