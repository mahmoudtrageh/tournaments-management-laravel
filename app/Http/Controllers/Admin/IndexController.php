<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Message;
use App\Tournament;
use App\Team;
use App\Player;


class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminPermissions:1');
    }
    

    public function index ()
    {

        if(auth()->guard('admin')->user()){

                        $tournaments = Tournament::all();
            $teams = Team::all();
            $players = Player::all();

            return view('dashboard.index', compact('tournaments', 'teams', 'players'));

        } else {

        return redirect('get.login');

    }
    }
}
