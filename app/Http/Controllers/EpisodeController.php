<?php

namespace App\Http\Controllers;

use App\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EpisodeController extends Controller
{
    public function store(Request $request)
    {


        $request->validate([
            'tmdb_id' => 'required',
            'episode_tmdb_id' => 'required',
        ]);

        $request->request->add(['user_id' => Auth::id()]);

        $find=Episode::EpisodeExist($request->user_id, $request->episode_tmdb_id);

        if ($find)
        {
            $this->destroy($find);

            return redirect()->back();

        }else{

            $episode=new Episode();

            $episode->tmdb_id = $request->tmdb_id;
            $episode->episode_tmdb_id = $request->episode_tmdb_id;
            $episode->user_id = $request->user_id;
            $episode->seen = true;

            $episode->save();

            return redirect()->back();

        }


    }

    public function destroy($data)
    {
        DB::table('episodes')->where('episode_tmdb_id', $data->episode_tmdb_id)->where('user_id', $data->user_id)->delete();

    }
}
