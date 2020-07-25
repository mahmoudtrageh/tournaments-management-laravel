<?php

namespace App\Http\Controllers\Admin;

use App\Team;
use App\Player;
use App\Tournament;
use App\Group;
use App\Admin;
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
$groups = Group::all();



        $all_tournaments = Tournament::all();
        if(!empty($players) && !empty(auth()->guard('admin')->user()->teams->pluck('id')->toArray())) {
        foreach($players as $player) {
            $teams = Team::where('id', $player->team_id)->get();
            $groups = Group::where('id', $player->group_id)->get();

                foreach($teams as $team) {
                $tournaments = Tournament::where('id', $team->tournament_id)->get();
                    
                }
                
                $teams_repeats = Team::where('manager_email', auth()->guard('admin')->user()->email)->get();

                            

                                $specific_players = Player::whereIn('team_id', $teams_repeats->pluck('id')->toArray())->get();


            

                
            }
           
          

            return view('dashboard.players', compact('teams', 'tournaments', 'all_tournaments', 'players', 'groups', 'specific_players'));

    } else {
        
        return view('dashboard.players', compact('all_tournaments', 'players', 'tournaments', 'teams', 'groups', 'specific_players'));

    }

    
    }
    
    
    
    
     public function indexAll()
    {
        $players = Player::all();
        $specific_players =  Player::all();

        $admins = Admin::all();
        $tournaments = Tournament::all();
        $teams = Team::all();
$groups = Group::all();



        $all_tournaments = Tournament::all();
        if(!empty($players) && !empty(auth()->guard('admin')->user()->teams->pluck('id')->toArray())) {
        foreach($players as $player) {
            $teams = Team::where('id', $player->team_id)->get();
            $groups = Group::where('id', $player->group_id)->get();

                foreach($teams as $team) {
                $tournaments = Tournament::where('id', $team->tournament_id)->get();
                    
                }
                
                $teams_repeats = Team::where('manager_email', auth()->guard('admin')->user()->email)->get();

                            

                                $specific_players = Player::whereIn('team_id', $teams_repeats->pluck('id')->toArray())->get();


            

                
            }
           
          

            return view('dashboard.players', compact('teams', 'tournaments', 'all_tournaments', 'players', 'groups', 'specific_players'));

    } else {
        
        return view('dashboard.players', compact('all_tournaments', 'players', 'tournaments', 'teams', 'groups', 'specific_players'));

    }

    
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
            
        $input = $request->all();



        $destination = public_path('images/img');
        $input['img'] = add_file($request->file('img'), $destination);


        $destination = public_path('files');
        $input['file1'] = add_file($request->file('file1'), $destination);
        
                    if(count(Team::where('code', $request->code)->get()) != 0) {




        $teams = Team::where('code', $request->code)->get();
        

        foreach($teams as $team) {

            if($team->code_expired == 1) {

                return redirect()->back()->with('error', 'هذا الكود معطل في الوقت الحالي');

            }
            
        


                $myDate = $request->birth;
        
                $player_year = Carbon::parse($myDate)->age;

               
                
               foreach($team->groups as $group) {

                $check_groups = $group->where('max_birth', '<=',  $myDate)->where('min_birth', '>=',  $myDate)->where('tournament_id', $group->tournament_id)->get();
                
                if(count($check_groups) == 0) {

                    return redirect()->back()->with('error', 'لا تتوفر مجموعة لهذا العمر');

                } else {

                foreach($check_groups as $check_group) {

                    if($check_group->max_players <= count($check_group->players)) {
                        return redirect()->back()->with('error', 'هذه المجموعة قد اكتمل عددها');

                    }

                    if($team->tournament_id == $check_group->tournament_id) {
                    $input['group_id'] = $check_group->id;
                    }   
                }

            }
               }


        $input['team_id'] = $team->id;
        $input['tournament_id'] = $team->tournament_id;


        } 
        
        } else {
                            return redirect()->back()->with('error', 'هذا الكود غير صحيح');

        }
            

        $players = Player::create($input);

         
            $registers = $players->teams;
            
        \Mail::to($registers->manager_email)->send(new registerPlayer($registers, $players));

        return redirect()->back()->with('success', 'تمت الإضافة بنجاح');
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
          
           foreach($team->groups as $group) {


            $check_groups = $group->where('max_birth', '<=',  $myDate)->where('min_birth', '>=',  $myDate)->where('tournament_id', $checker->tournament_id)->get();

            if(count($check_groups) == 0) {

                return redirect()->back()->with('error', 'لا تتوفر مجموعة لهذا العمر');
            

            } else if (count($check_groups) > 0) {

                

                foreach($check_groups as $check_group) {

                    if($team->tournament_id == $check_group->tournament_id) {
                    $checker['group_id'] = $check_group->id;
                    }   
                }

        }
           
        
    }


    
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
          
           foreach($team->groups as $group) {


            $check_groups = $group->where('max_birth', '<=',  $myDate)->where('min_birth', '>=',  $myDate)->where('tournament_id', $checker->tournament_id)->get();

            if(count($check_groups) == 0) {

                return redirect()->back()->with('error', 'لا تتوفر مجموعة لهذا العمر');
            

            } else if (count($check_groups) > 0) {

                

                foreach($check_groups as $check_group) {

                    if($team->tournament_id == $check_group->tournament_id) {
                    $checker['group_id'] = $check_group->id;
                    }   
                }

        }
           
        
    }


    
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

    public function updateStatus(Request $request)
    {


        $user = Player::find($request->id);

        $user->status = $request->status;
        $user->save();
        return response()->json(["status" => "ok", 'user' => $user]);
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




    $tournaments = Tournament::all();
    


        $tournament = $request->tournament;

    if($tournament)

        $players = $players->where('tournament_id', $tournament);



            $groups = Group::all();


        $group = $request->group;

    if($group)

        $players = $players->where('group_id', $group);
    


            $teams = Team::all();


        $team = $request->team;

    if($team)

        $players = $players->where('team_id', $team);
    


    return view('dashboard.players', compact('players', 'tournaments', 'groups', 'teams'));


}
}
