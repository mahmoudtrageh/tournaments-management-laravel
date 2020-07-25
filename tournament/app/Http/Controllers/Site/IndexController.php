<?php


namespace App\Http\Controllers\Site;
use App\Tournament;
use App\Team;
use App\Admin;
use App\Role;
use App\Season;
use Carbon\Carbon;
use App\AdminRole;
use App\Player;
use App\Notifications\RegisterTeam;
use App\Mail\registerTeamMail;
use App\Mail\activateTeam;
use Illuminate\Http\Request;
use App\Mail\registerPlayer;
use App\Http\Controllers\Controller;


class IndexController extends Controller
{
    public function index ()
    {
        $roles = Role::all();

        $teams = Team::all();

        $current_date = date('Y-m-d');

        $all_seasons = Season::where('end', '>=', $current_date)->where('status', 1)->get();

        if(count($all_seasons) != 0) {

        foreach($all_seasons as $all_season) {

         $someModel = new Tournament();

        $someModel->setConnection('mysql2');


            $all_tournaments = Tournament::where('end', '>=', $current_date)->where('status', 1)->get();
            
        }

        if(count($teams) != 0) {
            foreach($teams as $team) {
                $admins = Admin::where('email', $team->manager_email)->get();
            $tournaments = Tournament::where('id', $team->tournament_id)->get();
            }

        
            return view('site.index', compact('teams', 'tournaments', 'all_tournaments', 'admins', 'roles', 'all_seasons'));

        } else{


        return view('site.index', compact('teams', 'all_tournaments', 'main_all_tournaments', 'roles', 'all_seasons'));
        } 

    } else {


         $someModel = new Tournament();

        $someModel->setConnection('mysql2');

            $main_all_tournaments = $someModel->setConnection('mysql2')->where('end', '>=', $current_date)->where('status', 1)->get();

        return view('site.index', compact('teams', 'roles', 'all_seasons', 'main_all_tournaments'));

    }

    
    }

     public function siteLogin ($id)
    {
        $id = $id;
        return view('site.site-login', compact('id'));

    }
    
         public function siteLoginSecond ()
    {
        return view('site.site-login');

    }

      public function playerLogin ()
      
    {
        $seasons = Season::all();
        return view('site.player-login', compact('seasons'));

    }

      public function teamRegister ($id)
    {

                    $seasons = Season::all();

           $current_date = date('Y-m-d');
       
        $all_tournaments = Tournament::where('end', '>=', $current_date)->where('status', 1)->where('id', $id)->get();

        
        return view('site.team-register', compact('all_tournaments', 'seasons'));

    }
    
    
          public function teamRegisterSecond ()
    {

         
                    $seasons = Season::all();

        
        return view('site.team-register', compact('seasons'));

    }



          public function playerRegister ()
    {

                    $seasons = Season::all();

        return view('site.player-register', compact('seasons'));

    }


    public function teamRegisterLive (Request $request) {
        
        $id = intval($request->id);
        
        $users = Team::where('manager_email', auth()->guard('admin')->user()->email)->get();
        

foreach($users as $user) {
    
    if($user->tournament_id == $id) {
                return response()->json(["status" => "not-ok", 'user' => $user]);

    } else {
    
    
$input = $request->all();
           $input['name'] = $user->name;
            $input['tournament_id'] = $id;
            $input['manager_name'] = $user->manager_name;
           $input['manager_email'] = $user->manager_email;
           $input['mobile_number'] = $user->mobile_number;
           $input['password'] = $user->password;
           $input['city'] = $user->city;
           $input['trainer'] = $user->trainer;
           $input['season_id'] = $user->season_id;
           $input['max_player'] = $user->max_player;
    }
}



           
            $teams = Team::create($input);
         $user->save();
        return response()->json(["status" => "ok", 'user' => $user]);

    }


    public function addTeam(Request $request)
    {

    
            $this->validate($request, [
                'name' => 'required',
                'manager_name' => 'required',
                'manager_email' => 'required',
                'mobile_number' => 'required',
                'password' => 'required',
    'trainer' => 'required',
    'city' => 'required',
        'season_id' => 'required',

            ],
                [
                    'name.required' =>'من فضلك أضف اسم الفريق',
                    'manager_name.required' => 'من فضلك أضف إسم مدير الفريق',
                    'manager_email.required' => 'من فضلك أضف بريد مدير الفريق',
                    'mobile_number.required' => 'من فضلك أضف رقم هاتف مدير الفريق',
                    'password.required' => 'من فضلك أضف كلمة مرور مدير الفريق',
                        'trainer.required' => 'من فضلك أضف اسم المدرب',
                    'city.required' => 'من فضلك أضف المدينة',
                    'season_id.required' => 'من فضلك اختر الموسم ',

                ]);
      
    
    $tournaments = Tournament::where('id', $request->tournament_id)->get();

    $teams = Team::where('tournament_id', $request->tournament_id)->get();

foreach($tournaments as $tournament) {

    //    if($tournament->type == 'رابطة' && $tournament->type != $request->type) {
    //         return redirect()->back()->with('error', ' هذا الفريق من النوع ' . $request->type . ' ليس نفس نوع البطولة');
    //    }

       foreach($teams as $team) {


    if($team->manager_email == $request->manager_email && $team->tournament_id == $request->tournament_id) {
        return redirect()->back()->with('error', 'هذا الفريق مسجل مسبقًا');
    }

}
}

    
            $input = $request->all();
            
            if($request->file('logo')) {
                                $destination = public_path('images/img');
        $input['logo'] = add_file($request->file('logo'), $destination);
            }
    
   


            $input_admin = $request->all();
    
           $input_admin['name'] = $request->manager_name;
    
           $input_admin['email'] = $request->manager_email;
           $input_admin['password'] = bcrypt($request->password);
        
           $input_admin = Admin::create($input_admin);
    
           $input['password'] = bcrypt($request->password);
    
           
            $teams = Team::create($input);
    
        
           if ($input_admin) {
            $input_admin->roles()->attach($request->roles);
            $input_admin->teams()->attach($teams['id']);
    
           }
    
           if($teams) {
    
  
            $admins = Admin::all();
       
          
    
                   $admin_roles = AdminRole::where('role_id', 1)->get();
    
                   foreach($admin_roles as $admin_role) {
    
                    $admins = Admin::where('id', $admin_role->admin_id)->get();
                    foreach($admins as $admin) {
    
                    $admin->notify(new RegisterTeam($teams));
                    \Mail::to($admin)->send(new RegisterTeamMail($teams));
    
                    $when = Carbon::now()->addSeconds(5);
    
                    $mailJob = (new RegisterTeamMail($teams))->onQueue('mail')->delay($when);
    
                    \Mail::send(new RegisterTeamMail($teams));
    
                    }
    
                   }
       
                }

                return redirect()->back()->with('success', 'تم تسجيل الفريق بنجاح');

            }

    public function getMax(Request $request)
    {
        $user = Season::find($request->id);
      
        return response()->json(["status" => "ok", 'user' => $user]);
    }
    

            public function addXPlayer (Request $request) {

                $this->validate($request, [
            'code' => 'required',
            'national_id' => 'required|digits:10',
            'type' => 'required',
            'season_id' => 'required',

        ],
            [
                'code.required' =>'برجاء إدخال كود الفريق',
                'national_id.required' => 'برجاء إدخال رقم الهوية الوطنية', 'type.required' => 'برجاء اختيار هل اللاعب مسجل في نادي أم لا',               
                'season_id.required' => 'برجاء اختيار الموسم ',               
          
            ]);


$xplayers = Player::where('national_id', $request->national_id)->where('season_id', $request->season_id)->get();



                        if(count($xplayers) == 0) {
            
                
                $teams = Team::where('code', $request->code)->get();

            $xplayers = Player::where('national_id', $request->national_id)->get();
                


        $input = $request->all();

                        if(count($xplayers) != 0) {

                 foreach($xplayers as $xplayer) {

                   
                    $input['name'] = $xplayer->name;
                    $input['birth'] = $xplayer->birth;

        $input['img'] = $xplayer->img;

        $input['file1'] = $xplayer->file1;

        $input['file2'] = $xplayer->file2;

                    $input['nationality'] = $xplayer->nationality;

                    if(count(Team::where('code', $request->code)->get()) != 0) {

        $teams = Team::where('code', $request->code)->get();


        foreach($teams as $team) {

            if($team->code_expired == 1) {

                return redirect()->back()->with('error', 'هذا الكود معطل في الوقت الحالي');

            }


                $myDate = $xplayer->birth;
        
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
            

        return redirect()->back()->with('success', 'تمت الإضافة بنجاح');
        }
            }

                            $players = Player::create($input);
                            return redirect()->back()->with('success', 'تم التسجيل بنجاح');

                } 

                }else {

                            return redirect()->back()->with('error', 'هذا اللاعب غير مسجل');



            }
            
            
                        } else {
        return redirect()->back()->with('error', 'هذا اللاعب مسجل مسبقًا قم بتسجيل سريع للبيانات');

    }

            }



    public function addPlayer(Request $request)
    {
        
        $this->validate($request, [
            'code' => 'required',
            'national_id' => 'required|digits:10',
            'name' => 'required',
            'birth' => 'required',
            'type' => 'required',
            'nationality' => 'required',
            'file1' => 'required',
            'season_id' => 'required',

        ],
            [
                'code.required' =>'برجاء إدخال كود الفريق',
                'national_id.required' => 'برجاء إدخال رقم الهوية الوطنية',           
                'name.required' =>'برجاء إدخال اسم اللاعب',
                'birth.required' =>'برجاء إدخال تاريخ ميلاد اللاعب',
                'type.required' =>'برجاء تحديد هل اللاعب مسجل في نادي أم لا ؟',
                'nationality.required' =>'برجاء إدخال جنسية اللاعب',
                'file1.required' =>'برجاء إدخال صورة من أي مستند تثبت تاريخ الميلاد',
                'season_id.required' =>'برجاء إدخال الموسم',
            ]);
           

            $xplayers = Player::where('national_id', $request->national_id)->where('season_id', $request->season_id)->get();



                        if(count($xplayers) == 0) {

        $input = $request->all();

if($request->file('img')) {
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
            
        // \Mail::to($registers->manager_email)->send(new registerPlayer($registers, $players));

        return redirect()->back()->with('success', 'تم التسجيل بنجاح');

    } else {
        return redirect()->back()->with('error', 'هذا اللاعب مسجل مسبقًا قم بتسجيل سريع للبيانات');

    }
    
    }

    public function checkTeam(Request $request)
    {


        $check_teams = Team::where('code', $request->value)->get();
        
        return response([
            'data' => [
                'response' => 'ok',
                'check_teams' => $check_teams
            ]
        ]);


        
    }


    public function updateStatusExpire(Request $request)
    {
        
        $user = Team::find($request->id);
        $user->code_expired = 1;
        $user->save();

        return response()->json(["status" => "ok", 'user' => $user]);

    }



}

