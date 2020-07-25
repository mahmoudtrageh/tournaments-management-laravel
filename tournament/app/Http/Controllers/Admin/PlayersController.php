<?php

namespace App\Http\Controllers\Admin;

use App\Team;
use App\Player;
use App\Tournament;
use App\Admin;
use App\Season;
use App\AdminRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Mail\registerPlayer;

class PlayersController extends Controller
{
   
    public function index($id)
    {
        $players = Player::where('team_id', $id)->get();
        $specific_players =  Player::where('team_id', $id)->get();

        $admins = Admin::all();
        $tournaments = Tournament::all();
        $teams = Team::all();

        $seasons = Season::all();

        $all_tournaments = Tournament::all();
        if(!empty($players) && !empty(auth()->guard('admin')->user()->teams->pluck('id')->toArray())) {
        foreach($players as $player) {
            $teams = Team::where('id', $player->team_id)->get();

                foreach($teams as $team) {
                $tournaments = Tournament::where('id', $team->tournament_id)->get();
                    
                }
                
                $teams_repeats = Team::where('manager_email', auth()->guard('admin')->user()->email)->get();

                            

                                $specific_players = Player::whereIn('team_id', $teams_repeats->pluck('id')->toArray())->get();

        $seasons = Season::all();

            

                
            }
           
          

            return view('dashboard.players', compact('teams', 'tournaments', 'all_tournaments', 'players', 'specific_players', 'seasons'));

    } else {
        
        return view('dashboard.players', compact('all_tournaments', 'players', 'tournaments', 'teams', 'specific_players', 'seasons'));

    }

    
    }
    
    
    
    
     public function indexAll()
    {
        $players = Player::all();
        $specific_players =  Player::all();

        $admins = Admin::all();
        $tournaments = Tournament::all();
        $teams = Team::all();
        $seasons = Season::all();



        $all_tournaments = Tournament::all();
        if(!empty($players) && !empty(auth()->guard('admin')->user()->teams->pluck('id')->toArray())) {
        foreach($players as $player) {
            $teams = Team::where('id', $player->team_id)->get();

                foreach($teams as $team) {
                $tournaments = Tournament::where('id', $team->tournament_id)->get();
                    
                }
                
                $teams_repeats = Team::where('manager_email', auth()->guard('admin')->user()->email)->get();

                            

                                $specific_players = Player::whereIn('team_id', $teams_repeats->pluck('id')->toArray())->get();


                    $seasons = Season::all();


                
            }
           
          

            return view('dashboard.players', compact('teams', 'tournaments', 'all_tournaments', 'players', 'specific_players', 'seasons'));

    } else {
        
        return view('dashboard.players', compact('all_tournaments', 'players', 'tournaments', 'teams', 'specific_players', 'seasons'));

    }

    
    }



      public function tourPlayer()
    {



        foreach(auth()->guard('admin')->user()->tournaments as $tour) {
        
            
            $players = Player::where('tournament_id', $tour->id)->get();
            
          
      foreach($players as $player) {

            
            $teams = Team::where('id', $player->team_id)->get();

                foreach($teams as $team) {
                $tournaments = Tournament::where('id', $team->tournament_id)->get();
                    
                }
                
                $teams_repeats = Team::where('manager_email', auth()->guard('admin')->user()->email)->get();

            

                
            }

            $teams = Team::all();
                       $tournaments = Tournament::all();

            return view('dashboard.players', compact('teams', 'tournaments', 'players'));

    
      
        }


    
    }

     public function playerHistory($id)
    {
        
    
        $players = Player::where('id', $id)->get();
        
        foreach($players as $player) {
            
           
            $seasons = Season::where('id', $player->teams->season_id)->get();
            
        }
        return view('dashboard.player-history', compact('players', 'seasons'));


    }

    public function addPlayer(Request $request)
    {

$this->validate($request, [
            'code' => 'required',
            'name' => 'required',
            'birth' => 'required',
            'national_id' => 'required|digits:10',
            'img' => 'required',
            'file1' => 'required',
        ],
            [
                'code.required' =>'برجاء إدخال كود الفريق',
                'name.required' => 'برجاء أدخال إسم اللاعب',
                'birth.required' => 'برجاء أدخال تاريخ الميلاد',
                'national_id.required' => 'برجاء إدخال رقم الهوية الوطنية',
                'img.required' => 'برجاء إدخال الصورة الشخصية',
                'file1.required' => 'برجاء رفع ملف مستند اثبات تاريخ الميلاد (جواز سفر, بطاقة وطنية, دفتر عائلة)',
               
            ]);
            
            
            $xplayers = Player::where('national_id', $request->national_id)->where('season_id', $request->season_id)->get();



                        if(count($xplayers) == 0) {
            
        $input = $request->all();


if ($request->file('img')) {
    $destination = public_path('images/img');
        $input['img'] = add_file($request->file('img'), $destination);

}

        if($request->file('file1')) {
              $destination = public_path('files');
        $input['file1'] = add_file($request->file('file1'), $destination);
        
        }

      
                    if(count(Team::where('code', $request->code)->get()) != 0) {




        $teams = Team::where('code', $request->code)->get();
        

        foreach($teams as $team) {

            if($team->code_expired == 1) {

                return redirect()->back()->with('error', 'هذا الكود معطل في الوقت الحالي');

            }
            
        


                $myDate = $request->birth;
        
                $player_year = Carbon::parse($myDate)->age;

        $input['team_id'] = $team->id;
        $input['tournament_id'] = $team->tournament_id;


        } 
        
        } else {
                            return redirect()->back()->with('error', 'هذا الكود غير صحيح');

        }

            foreach(Team::where('code', $request->code)->get() as $te) {
                
 if((int)Season::find($request->season_id)->max <= count(Player::where('team_id', $te->id)->get())) {
     
                    return redirect()->back()->with('error', 'لا يمكن التسجيل لهذا الفريق لوصوله للحد الاقصى');

        } else {
            

            
            $players = Player::create($input);

         
            $registers = $players->teams;
            
        \Mail::to($registers->manager_email)->send(new registerPlayer($registers, $players));

        return redirect()->back()->with('success', 'تمت الإضافة بنجاح');
        }
            }


        $players = Player::create($input);

         
            $registers = $players->teams;
            
        \Mail::to($registers->manager_email)->send(new registerPlayer($registers, $players));

        return redirect()->back()->with('success', 'تمت الإضافة بنجاح');
        
    } else {
        return redirect()->back()->with('error', 'هذا اللاعب مسجل مسبقًا في هذا الموسم ');

    }
    }

    public function editPlayer(Request $request)
    {

        $checker = Player::find($request->player_id);

        $input = $request->all();

        if ($request->file('img')) {
            $destination = public_path('images/img');
            $input['img'] = update_file($request->file('img'), $checker, 'img', $destination);
        }

        if ($request->file('file1')) {
            $destination = public_path('files');
            $input['file1'] = update_file($request->file('file1'), $checker, 'file1', $destination);
        }


        $teams = Team::where('code', $request->code)->get();
    
        foreach($teams as $team) {
    
        $checker['team_id'] = $team->id;
        $checker['tournament_id'] = $team->tournament_id;

        }



            $myDate = $request->birth;


            $player_year = Carbon::parse($myDate)->age;
    
           $team = Team::find($checker->team_id);

            $tournament = Tournament::find($checker->tournament_id);

        $players = $checker->update($input);


        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }
    
    
    
    
    
     public function editSpecificPlayer(Request $request)
    {

        $checker = Player::find($request->player_id);

        $input = $request->all();

        if ($request->file('img')) {
            $destination = public_path('images/img');
            $input['img'] = update_file($request->file('img'), $checker, 'img', $destination);
        }

        if ($request->file('file1')) {
            $destination = public_path('files');
            $input['file1'] = update_file($request->file('file1'), $checker, 'file1', $destination);
        }


        $teams = Team::where('code', $request->code)->get();
    
        foreach($teams as $team) {
    
        $checker['team_id'] = $team->id;
        $checker['tournament_id'] = $team->tournament_id;

        }



            $myDate = $request->birth;


            $player_year = Carbon::parse($myDate)->age;
    
           $team = Team::find($checker->team_id);

            $tournament = Tournament::find($checker->tournament_id);

        $players = $checker->update($input);


        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }


 public function deleteSpecificPlayer(Request $request)
    {
        $checker = Player::find($request->player_id);
        $checker->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }
    

    public function deletePlayer(Request $request)
    {
        $checker = Player::find($request->player_id);
        $checker->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }


    public function updateStatusExpire(Request $request)
    {
        
        $user = Team::find($request->id);
        $user->code_expired = 1;
        $user->save();

        return response()->json(["status" => "ok", 'user' => $user]);

    }
    
    public function filter(Request $request)

{
    $players = Player::all();

    $player = $request->player;

    if ($player)

        $players = $players->where('id', $player);

        $specific_players = $players->where('id', $player);



    $seasons = Season::all();
    

        $season = $request->season;

    if($season)

        $players = $players->where('season_id', $season);
                $specific_players = $players->where('season_id', $season);

    
            $teams = Team::all();


        $team = $request->team;

    if($team)

        $players = $players->where('team_id', $team);
    $specific_players = $players->where('team_id', $team);


    return view('dashboard.players', compact('players', 'seasons', 'teams', 'specific_players'));


}
}
