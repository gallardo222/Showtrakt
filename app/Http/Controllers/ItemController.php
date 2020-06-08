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
            $comments=DB::table('comments')->where('item_id', $tmdbId)->get();

            $watched=Item::ItemWatched(Auth::id(), $tmdbId, true);
            $watchlist=Item::ItemWatchlist(Auth::id(), $tmdbId, true);

            return view('items.show')->with('item', $item)->with('watched', $watched)->with('watchlist', $watchlist)->with('episodes', $episodes)->with('comments', $comments);

        }else{

            $item=$item->item($tmdbId,$mediaType);

            $watched=Item::ItemWatched(Auth::id(), $tmdbId, true);
            $watchlist=Item::ItemWatchlist(Auth::id(), $tmdbId, true);
            $comments=DB::table('comments')->where('item_id', $tmdbId)->get();


            return view('items.show')->with('item', $item)->with('watched', $watched)->with('watchlist', $watchlist)->with('comments', $comments);


        }

    }

    public function search()
    {

        return view('items.search');
    }

    public function searchItem(Request $request, Item $item)
    {
        //dd($request->all());
        $items=$item->search($request->search);
        //dd($item);

        return view('items.search')->with('items',$items);
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

                    $this->handleWatch($request, $find, $item);

                return redirect()->back();

            }

            if ($nameRoute == 'item.watchlist') {

                    $this->handleWatchlist($request, $find, $item);

                return redirect()->back();

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

    public function handleWatch($data1, $data2, $data3)
    {
        if ($data2->watched) {

            $this->destroy($data2);


        } else {

            $data3->watched = true;

            DB::table('items')->where('tmdb_id', $data1->tmdb_id)->where('user_id', $data1->user_id)->update(['watched' => $data3->watched]);

        }
    }

    public function handleWatchlist($data1, $data2, $data3)
    {
        if ($data2->watchlist) {

            DB::table('items')->where('tmdb_id', $data1->tmdb_id)->where('user_id', $data1->user_id)->update(['watchlist' => false]);

        } else {

            $data3->watchlist = true;

            DB::table('items')->where('tmdb_id', $data1->tmdb_id)->where('user_id', $data1->user_id)->update(['watchlist' => $data3->watchlist]);

        }
    }

    public function destroy($data)
    {
        DB::table('items')->where('tmdb_id', $data->tmdb_id)->where('user_id', $data->user_id)->delete();
        DB::table('episodes')->where('tmdb_id', $data->tmdb_id)->where('user_id', $data->user_id)->delete();

    }
}
