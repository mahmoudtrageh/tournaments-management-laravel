<?php

namespace App\Http\Controllers\Admin;

use App\Team;
use App\Admin;
use App\Role;
use App\Tournament;
use App\AdminRole;
use App\Season;
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
          if($rol->id == 2 || $rol->id == 3) {
              $teams = Team::where('manager_email', auth()->guard('admin')->user()->email)->get();
             
              
              $tournaments = Tournament::all();
                    $seasons = Season::all();

              foreach($tournaments as $tournament) {
                  
                        
                return view('dashboard.teams', compact('teams', 'id', 'tournaments', 'seasons'));

              }

          }

      }


if(Tournament::find($id) != null) {
    
        $teams = Tournament::find($id)->teams;
        
                $tournaments = Tournament::where('id', $id)->get();
                
}
                
        $admins = Admin::all();

                          
        $seasons =  Season::all();
                
        return view('dashboard.teams', compact('teams', 'id', 'admins', 'tournaments', 'seasons', 'seasons'));

    }

    public function allTeams()
    {

        $teams = Team::all();
                
        $admins = Admin::all();

        
        $seasons = Season::all();

        $tournaments = Tournament::all();
                                          
        return view('dashboard.teams', compact('teams', 'admins', 'tournaments', 'seasons'));

    }
        
        public function changeImg(Request $request)
    {

        $checker = Team::find($request->team_id);


        $input = $request->all();
        
if ($request->file('logo')) {
            $destination = public_path('images/img');
            $input['logo'] = update_file($request->file('logo'), $checker, 'logo', $destination);
        }
         

    $teams = $checker->update($input);
    
        return redirect()->back()->with('success', 'تم تغيير الصورة بنجاح');

    }
              

    public function addTeam(Request $request)
    {

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
                'manager_name.required' => 'من فضلك أضف اسم مدير الفريق',
                'manager_email.required' => 'من فضلك أضف بريد مدير الفريق',
                'mobile_number.required' => 'من فضلك أضف رقم جوال مدير الفريق',
                'password.required' => 'من فضلك أضف كلمة المرور',
                'season_id.required' => 'من فضلك اختر الموسم',

            ]);


$teams = Team::all();

foreach($teams as $team) {

    if($team->manager_email == $request->manager_email && $team->name == $request->name) {
        return redirect()->back()->with('error', 'هذا الفريق مسجل مسبقًا');
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
    

       $input['password'] = bcrypt($request->password);

              $input_admin = Admin::create($input_admin);

              if(Season::find($request->season_id)->status == 0) {

                return redirect()->back()->with('error', 'هذا الموسم مغلق الآن ولا يسمح بتسجيل فرق جديدة');

              } else {

                    $teams = Team::create($input);

              }


       

    
       if ($input_admin) {
        $input_admin->roles()->attach($request->roles);
        $input_admin->teams()->attach($teams['id']);
       }

       if($teams) {
               $teams->seasonss()->attach($request->season_id);



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
    if($team->manager_email == $te->manager_email && $team->name == $request->name) {
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
        
        $admin_checker = Admin::Where('email', $checker->manager_email)->get();
        
        $input = $request->all();
        $admin_input = $request->all();


           if ($request->file('logo')) {
            $destination = public_path('images/img');
            $input['logo'] = update_file($request->file('logo'), $checker, 'logo', $destination);
        }
       
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
        
        foreach($admin_checker as $admin_check) {
                    $admins = $admin_check->update($admin_input);
        }


      

        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }

    public function deleteTeam(Request $request)
    {
        $checker = Team::find($request->team_id);
        $admin_checker = Admin::Where('email', $checker->manager_email)->get();


        $checker->delete();
        
        foreach($admin_checker as $admin_check) {
        if($admin_check) {
        $admin_check->delete();
        }
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


     public function filter(Request $request)

{
    
    $teams = Team::all();
    $all_seasons = Season::all();
    $tournaments = Tournament::all();
    $season = $request->season;
        $seasons = Season::all();

    if ($season)

        $teams = $teams->where('season_id', $season);


    return view('dashboard.teams', compact('teams', 'all_seasons', 'tournaments', 'seasons'));


}

        public function getMax(Request $request)
    {
        $user = Season::find($request->id);
      
        return response()->json(["status" => "ok", 'user' => $user]);
    }

}
