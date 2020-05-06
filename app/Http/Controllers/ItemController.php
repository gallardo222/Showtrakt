<?php

namespace App\Http\Controllers;

use App\Item;
use App\Item\Model;
use GuzzleHttp\Client;
use App\TMDB;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{

    public function item($tmdbId, $mediaType, Item $item)
    {

        $item=$item->item($tmdbId,$mediaType);
        //dd($item);
        return view('items.show')->with('item', $item);
    }


    public function store(Request $request, TMDB $tmdb)
    {

        $request->validate([
            'title' => 'required',
            'tmdb_id' => 'required',
            'poster' => 'required',
            'media_type' => 'required',
        ]);

        $request->request->add(['user_id' => Auth::id()]);

        $item=new Item($tmdb);

        //dd($request->title);

        $item->title = $request->title;
        $item->tmdb_id = $request->tmdb_id;
        $item->user_id = $request->user_id;
        $item->poster = $request->poster;
        $item->media_type = $request->media_type;


        $item->save();

        //Item::create($tmdb,$request->all());

        return redirect()->back()->with('flash','Film added');
    }
}
