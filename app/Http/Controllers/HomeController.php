<?php

namespace App\Http\Controllers;
use App\TMDB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $tmdb;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TMDB $tmdb)
    {
        //$this->middleware('auth');
        $this->tmdb = $tmdb;

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $popular=$this->tmdb->trending();
        //dd($popular);
        return view('home')->with('movies', $popular);
    }
}
