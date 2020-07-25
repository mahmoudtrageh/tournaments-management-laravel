<?php


namespace App\Http\Controllers\Site;
use App\Tournament;
use App\Team;
use App\Admin;
use App\Role;
use App\Group;
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

        $groups = Group::all();

        $teams = Team::all();

        $current_date = date('Y-m-d');
       
        $main_all_tournaments = Tournament::where('end', '>=', $current_date)->where('status', 1)->get();


        if(count($teams) != 0) {
            foreach($teams as $team) {
                $admins = Admin::where('email', $team->manager_email)->get();
            $tournaments = Tournament::where('id', $team->tournament_id)->get();
            }

            return view('site.index', compact('teams', 'tournaments', 'main_all_tournaments', 'admins', 'roles', 'groups'));

        } else{

        return view('site.index', compact('teams', 'main_all_tournaments', 'roles', 'groups'));
    }
    }

    

    public function addTeam(Request $request)
    {

        if($request->group_id) {


            $this->validate($request, [
                'name' => 'required',
                'manager_name' => 'required',
                'manager_email' => 'required',
                'mobile_number' => 'required',
                'password' => 'required',
    
            ],
                [
                    'name.required' =>'please add name',
                    'manager_name.required' => 'please add name',
                    'manager_email.required' => 'please add name',
                    'mobile_number.required' => 'please add name',
                    'password.required' => 'please add name',
    
                ]);
    
            } else {
                $this->validate($request, [
                    'name' => 'required',
                    'manager_name' => 'required',
                    'manager_email' => 'required',
                    'mobile_number' => 'required',
                    'password' => 'required',
                    'groups' => 'required',
        
                ],
                    [
                        'name.required' =>'please add name',
                        'manager_name.required' => 'please add name',
                        'manager_email.required' => 'please add name',
                        'mobile_number.required' => 'please add name',
                        'password.required' => 'please add name',
                        'groups.required' =>'يجب اختيار على الأقل مجموعة واحدة',
        
                    ]);
            }
    
    
    $teams = Team::all();

foreach($teams as $team) {
    if($team->manager_email == $request->manager_email && $team->tournament_id == $request->tournament_id) {
        return redirect()->back()->with('error', 'هذا الفريق مسجل مسبقًا');
    }
}

    
            $input = $request->all();
    
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
            $teams->tournamentss()->attach($request->tournament_id);
    
            if($request->group_id) {
                $teams->groups()->attach($request->group_id);
    
            } else {
    
                $teams->groups()->attach($request->groups);
    
            }
    
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

        return redirect()->back()->with('success', 'تم التسجيل بنجاح');
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



   



    public function checkGroup(Request $request)
    {


        $myDate = $request->value;

        $teams = Team::all();
        foreach($teams as $team) {
            $count_teams = $team->groups->count();
           
        }

        $player_year = Carbon::parse($myDate)->age;


        $check_groups = Group::where('max_birth', '<=',  $myDate)->where('min_birth', '>=',  $myDate)->get();

        return response([
            'data' => [
                'response' => 'ok',
                'check_groups' => $check_groups,
                'count_teams' => $count_teams
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



    // home 

     public function siteLogin ($id)
    {
        $id = $id;
        return view('site.site-login', compact('id'));

    }
    

      public function playerLogin ()
      
    {
        return view('site.player-login');

    }

      public function teamRegister ($id)
    {

           $current_date = date('Y-m-d');
       
        $all_tournaments = Tournament::where('end', '>=', $current_date)->where('status', 1)->where('id', $id)->get();

        
        return view('site.team-register', compact('all_tournaments'));

    }



          public function playerRegister ()
    {

        return view('site.player-register');

    }


     public function addXPlayer (Request $request) {

                $this->validate($request, [
            'code' => 'required',
            'national_id' => 'required|digits:10',
        ],
            [
                'code.required' =>'برجاء إدخال كود الفريق',
                'national_id.required' => 'برجاء إدخال رقم الهوية الوطنية',               
            ]);

            
                
                $teams = Team::where('code', $request->code)->get();

            $xplayers = Player::where('national_id', $request->national_id)->get();
                


        $input = $request->all();

                        if(count($xplayers) != 0) {

                 foreach($xplayers as $xplayer) {

                   
                    $input['name'] = $xplayer->name;
                    $input['birth'] = $xplayer->birth;

        $input['img'] = $xplayer->img;

        $input['file1'] = $xplayer->file1;

         $input['group_id'] = $xplayer->group_id;

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
                
                            $players = Player::create($input);
                            return redirect()->back()->with('success', 'تم التسجيل بنجاح');

                } 

                }else {

                            return redirect()->back()->with('error', 'هذا اللاعب غير مسجل');



            }

            }

}

