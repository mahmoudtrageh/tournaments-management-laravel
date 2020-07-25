<?php

namespace App\Http\Controllers\Admin;

use App\Team;
use App\Admin;
use App\Role;
use App\Tournament;
use App\Group;
use App\AdminRole;
use App\Notifications\RegisterTeam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use App\Mail\registerTeamMail;
use App\Mail\activateTeam;
class TeamController extends Controller
{
   
    public function index($id)
    {
        
      foreach(auth()->guard('admin')->user()->roles as $rol){
          if($rol->id == 2 ) {
              $teams = Team::where('manager_email', auth()->guard('admin')->user()->email)->get();
             
            
              
              $tournaments = Tournament::all();
              
              foreach($tournaments as $tournament) {
                  
                        $groups = Group::where('tournament_id', $tournament->id)->get();

                return view('dashboard.teams', compact('teams', 'id', 'tournaments', 'groups'));

              }

        

          }
      }


        $teams = Tournament::find($id)->teams;
        

        $groups = Tournament::find($id)->groups;
        
        $admins = Admin::all();
        
        
        

        return view('dashboard.teams', compact('teams', 'groups', 'id', 'admins'));
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
            'season_id' => 'required',

        ],
            [
                'name.required' =>'من فضلك أضف اسم الفريق',
                'manager_name.required' => 'من فضلك أضف مدير الفريق',
                'manager_email.required' => 'من فضلك أضف بريد مدير الفريق',
                'mobile_number.required' => 'من فضلك أضف رقم جوال مدير الفريق',
                'password.required' => 'من فضلك أضف كلمة المرور',
                 'season_id.required' => 'من فضلك اختار الموسم',

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
    

       $input['password'] = bcrypt($request->password);

              $input_admin = Admin::create($input_admin);

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
    
    
    
    
    
    public function addTeamInner(Request $request)
    {





        $input = $request->all();
        
        
        foreach(auth()->guard('admin')->user()->teams as $te) {
            
            
$teams = Team::all();
foreach($teams as $team) {
    if($team->manager_email == $te->manager_email && $team->tournament_id == $request->tournament_id) {
        return redirect()->back()->with('error', 'هذا الفريق مسجل مسبقًا');
    }
}
            
            $input['manager_name'] = $te->manager_name;
            $input['manager_email'] = $te->manager_email;
            $input['mobile_number'] = $te->mobile_number;
       $input['password'] = $te->password;

        }



        $teams = Team::create($input);

       if($teams) {
           
                       $teams->tournamentss()->attach($request->tournament_id);
                       
                       
                        $groups = Group::where('tournament_id', $request->tournament_id)->get();


        if($request->group_id) {
            $teams->groups()->attach($request->group_id);

        } else {

            $teams->groups()->attach($groups);

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
    

    public function editTeam(Request $request)
    {


        $checker = Team::find($request->team_id);
        
        $admin_checker = Admin::find($request->admin_id);
        
        $input = $request->all();
        $admin_input = $request->all();

        $input['password'] = bcrypt($request->password);
        $admin_input['password'] = bcrypt($request->password);
        
        
         if ($request->password) {
            $input['password'] = bcrypt($request->password);
        $admin_input['password'] = bcrypt($request->password);
        } else {
            $input['password'] = $checker->password;
             $admin_input['password'] = $checker->password;
        }
        
        
        $admin_input['name'] = $request->manager_name;

       
        $teams = $checker->update($input);
        $admins = $admin_checker->update($admin_input);

        if($teams) {
        $checker->tournamentss()->sync($request->tournament_id);
        $checker->groups()->sync($request->groups);
        }
     
      

        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }

    public function deleteTeam(Request $request)
    {
        $checker = Team::find($request->team_id);
        $admin_checker = Admin::find($request->admin_id);
        $checker->delete();
        
        if($admin_checker) {
        $admin_checker->delete();
        }
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }

    public function updateStatus(Request $request)
    {


        $user = Team::find($request->id);
        $code = str_random(5);


        $user->status = $request->status;
        $user->code = $code;

        if($request->status == 0) {
            $user->code = null;
        }
        
        $user->save();
        
        \Mail::to($user['manager_email'])->send(new activateTeam($user));

        return response()->json(["status" => "ok", 'user' => $user]);
    }
    
    
    
        public function findGroup(Request $request)
    {
        $user = Tournament::find($request->id);


        $groups = Group::where('tournament_id', $user->id)->get();

        return response()->json(["status" => "ok", 'user' => $groups]);
    }


}
