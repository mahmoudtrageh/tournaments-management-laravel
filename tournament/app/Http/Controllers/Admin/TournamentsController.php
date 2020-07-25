<?php

namespace App\Http\Controllers\Admin;

use App\Tournament;
use App\Admin;
use App\Team;
use App\Season;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TournamentsController extends Controller
{
   
    public function index($id)
    {


        $seasons = Season::all();

      

        $admins = Admin::all();

            foreach(auth()->guard('admin')->user()->roles as $rol){

            if($rol->id == 3 ) {

              
                $tournaments = auth()->guard('admin')->user()->tournaments;
             
                foreach($tournaments as $tour) {
               $teams = $tour->teams;
                }
        return view('dashboard.tournaments', compact('tournaments', 'admins', 'teams', 'seasons', 'id'));
        }
    }

    }


    public function indexAll()
    {
        
        $tournaments = Tournament::all();

        $admins = Admin::all();

        $seasons = Season::all();


        return view('dashboard.tournaments', compact('tournaments', 'admins', 'seasons'));

    }

    public function seasonTournaments($id) {
        
        $admins = Admin::all();

        $seasons = Season::all();
        $tournaments = Tournament::where('season_id', $id)->get();
                return view('dashboard.tournaments', compact('tournaments', 'admins', 'seasons', 'id'));


    }


 public function changeImg(Request $request)
    {

        $checker = Tournament::find($request->tournament_id);


        $input = $request->all();
        
if ($request->file('logo')) {
            $destination = public_path('images/img');
            $input['logo'] = update_file($request->file('logo'), $checker, 'logo', $destination);
        }
         

    $tournaments = $checker->update($input);
    
        return redirect()->back()->with('success', 'تم تغيير الصورة بنجاح');

    }
  
    public function addTournament(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'start' => 'required',
            'end' => 'required',
            'details' => 'required',

        ],
            [
                'name.required' =>'من فضلك أدخل اسم البطولة',
                'start.unique' => 'من فضلك أدخل تاريخ بداية البطولة',
                'end.required' => 'من فضلك أدخل تاريخ نهاية البطولة',
                'details.required' => 'من فضلك أدخل وصف البطولة',

            ]);
        $input = $request->all();
        
        
        $input_admin = $request->all();

if($request->file('logo')) {
        $destination = public_path('images/img');
        $input['logo'] = add_file($request->file('logo'), $destination);
}

   $start_date = $request->start;
                $end_date = $request->end;

        if($start_date > $end_date) {
                    return redirect()->back()->with('error', 'لا يمكن إضافة تاريخ نهاية بطولة قبل تاريخ البداية');

        }
        $input['password'] = bcrypt($request->password);
        
        $admins = Admin::where('id', $request->admin_id)->get();
        
        foreach($admins as $admin) {
            
      
 $admin->roles()->sync(3);
        }
         
    

         
        $tournaments = Tournament::create($input);
       
        return redirect()->back()->with('success', 'تمت الاضافة بنجاح');
    }

    public function editTournament(Request $request)
    {

        $checker = Tournament::find($request->tournament_id);
        
        $input = $request->all();

         if ($request->file('logo')) {
            $destination = public_path('images/img');
            $input['logo'] = update_file($request->file('logo'), $checker, 'logo', $destination);
        }
       
        $tournaments = $checker->update($input);
     
        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }

    public function deleteTournament(Request $request)
    {
        $checker = Tournament::find($request->tournament_id);
        $checker->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }

    public function updateStatus(Request $request)
    {


        $user = Tournament::find($request->id);

        $user->status = $request->status;
        $user->save();
        return response()->json(["status" => "ok", 'user' => $user]);
    }

         public function filter(Request $request)

{
    $teams = Team::all();
    $tournaments = Tournament::all();
        $admins = Admin::all();
    $seasons = Season::all();
    $season = $request->season;

    if ($season)

        $tournaments = $tournaments->where('season_id', $season);


    return view('dashboard.tournaments', compact('teams', 'seasons', 'tournaments', 'admins'));


}
}
