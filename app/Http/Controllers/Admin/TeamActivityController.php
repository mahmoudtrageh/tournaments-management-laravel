<?php

namespace App\Http\Controllers\Admin;

use App\Team;
use App\Admin;
use App\Role;
use App\Tournament;
use App\Group;
use App\TeamGroup;
use App\Player;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamActivityController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        $count_players = Player::all();
$tournaments = Tournament::all();
$groups = Group::all();
      
        return view('dashboard.team-activity', compact('teams', 'count_players', 'tournaments', 'groups'));
}


public function editActivity(Request $request)

{

    $checker = Team::find($request->team_id);

    $input = $request->all();

    $teams = $checker->update($input);


    return redirect()->back()->with('success', 'تم التعديل بنجاح');

}

public function updateExpire(Request $request)
{


    $user = Team::find($request->id);


    $user->code_expired = $request->code_expired;
    
    $user->save();
    
    return response()->json(["status" => "ok", 'user' => $user]);
}


public function filter(Request $request)

{
    $teams = Team::all();

    $team = $request->team;

    if ($team)

        $teams = $teams->where('id', $team);




    $tournaments = Tournament::all();
    
            $groups = Group::all();


        $tournament = $request->tournament;

    if($tournament)

        $teams = $teams->where('tournament_id', $tournament);

    


    return view('dashboard.team-activity', compact('teams', 'tournaments', 'groups'));


}


public function filterGroup(Request $request)

{
    $teams = Team::all();
    $tournaments = Tournament::all();
    $groups = TeamGroup::all();

    $group = (int)$request->group;

    if($group){


      $group = Group::find($group);
      $teams = $group->teamss;
    

    return view('dashboard.team-activity', compact('teams', 'groups', 'tournaments'));
    

}

}


public function getTeam(Request $request)
{
    $user = Team::find($request->id);


    $teams = Team::where('id', $user->id)->get();

    return response()->json(["status" => "ok", 'user' => $teams]);
}

public function getTournament(Request $request)
{
    $user = Tournament::find($request->id);


    $tournaments = Tournament::where('id', $user->id)->get();

    return response()->json(["status" => "ok", 'user' => $tournaments]);
}

public function getGroup(Request $request)
{
    $user = Group::find($request->id);


    $groups = Group::where('id', $user->id)->get();

    return response()->json(["status" => "ok", 'user' => $groups]);
}



}
