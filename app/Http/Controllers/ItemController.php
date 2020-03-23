<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use App\Item\Model;

class ItemController extends Controller
{

    public function item($tmdbId, $mediaType, Item $item)
    {

        $item=$item->item($tmdbId,$mediaType);
        //dd($item);
        return view('items.show')->with('item', $item);
    }
}
