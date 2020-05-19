<?php

namespace App\Http\Controllers\Admin;

use App\Item;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {

        $totalusers=User::count();
        $totalitems = Item::TotalItems();

        //dd($totalusers);

        return view('admin.dashboard')->with('item', $totalitems)->with('user', $totalusers);
    }
}
