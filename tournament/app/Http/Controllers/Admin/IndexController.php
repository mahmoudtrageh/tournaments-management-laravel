<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Message;
use App\Tournament;
use App\Player;
use App\Team;
use App\Season;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminPermissions:1');
    }
    

    public function index ()
    {


        if(auth()->guard('admin')->user()){
            $seasons = Season::all();
            $tournaments = Tournament::all();
            $teams = Team::all();
            $players = Player::all();
            return view('dashboard.index', compact('seasons', 'tournaments', 'teams', 'players'));

        } else {

        return redirect('get.login');

    }
    }

    
        public function getSeason(Request $request)
    {
        $user = Season::find($request->id);
        $tournaments = $user->tournaments;
        $teams = $user->teams;

            $players = $user->players;
      
        return response()->json(["status" => "ok", 'tournaments' => $tournaments, 'teams' => $teams, 'players' => $players]);
    }

}
