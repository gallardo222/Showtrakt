<?php

namespace App\Http\Controllers;

use App\Episode;
use App\Item;
use App\Item\Model;
use GuzzleHttp\Client;
use App\TMDB;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{

    public function item($tmdbId, $mediaType, Item $item)
    {
        if ($mediaType == 'tv')
        {
            $episodes=$item->ItemEpisode($tmdbId, $mediaType);
            $item=$item->item($tmdbId,$mediaType);

            $watched=Item::ItemWatched(Auth::id(), $tmdbId, true);
            $watchlist=Item::ItemWatchlist(Auth::id(), $tmdbId, true);

            return view('items.show')->with('item', $item)->with('watched', $watched)->with('watchlist', $watchlist)->with('episodes', $episodes);

        }else{

            $item=$item->item($tmdbId,$mediaType);

            $watched=Item::ItemWatched(Auth::id(), $tmdbId, true);
            $watchlist=Item::ItemWatchlist(Auth::id(), $tmdbId, true);

            return view('items.show')->with('item', $item)->with('watched', $watched)->with('watchlist', $watchlist);


        }

    }


    public function store(Request $request, TMDB $tmdb)
    {

        $nameRoute = $request->route()->getName();

	    $request->validate([
            'title' => 'required',
            'tmdb_id' => 'required',
            'poster' => 'required',
            'media_type' => 'required',
        ]);

        $request->request->add(['user_id' => Auth::id()]);

        $item=new Item($tmdb);

        $find=Item::ItemExist($request->user_id, $request->tmdb_id);

        if ($find){

            if ($nameRoute == 'items.store') {

                if ($find) {
                    if ($find->watched) {

                        $this->destroy($find);

                        return redirect()->back();

                    } else {

                        $item->watched = true;

                        DB::table('items')->where('tmdb_id', $request->tmdb_id)->where('user_id', $request->user_id)->update(['watched' => $item->watched]);

                        return redirect()->back();

                    }
                }
            }

            if ($nameRoute == 'item.watchlist') {

                if ($find) {
                    if ($find->watchlist) {

                        $this->destroy($find);

                        return redirect()->back();

                    } else {

                        $item->watchlist = true;

                        DB::table('items')->where('tmdb_id', $request->tmdb_id)->where('user_id', $request->user_id)->update(['watchlist' => $item->watchlist]);

                        return redirect()->back();

                    }
                }
            }

        }else{

            $item->title = $request->title;
            $item->tmdb_id = $request->tmdb_id;
            $item->user_id = $request->user_id;
            $item->poster = $request->poster;
            $item->media_type = $request->media_type;

            if ($nameRoute == 'item.watchlist')
            {
                $item->watchlist = true;
            }
            if ($nameRoute == 'items.store')
            {
                $item->watched = true;

            }

            $item->save();

            return redirect()->back();

        }




    }

    public function destroy($data)
    {
        DB::table('items')->where('tmdb_id', $data->tmdb_id)->where('user_id', $data->user_id)->delete();

    }
}
