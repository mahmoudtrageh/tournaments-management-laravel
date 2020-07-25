<?php

namespace App\Http\Controllers\Admin;

use App\Tournament;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TournamentsController extends Controller
{
   
    public function index()
    {
        $tournaments = Tournament::all();
        
        return view('dashboard.tournaments', compact('tournaments'));
    }

    public function addTournament(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'start' => 'required',
            'end' => 'required',
        ],
            [
                'name.required' =>'please add name',
                'start.unique' => 'please add name',
                'end.required' => 'please add name',
               
            ]);
        $input = $request->all();

        $input['password'] = bcrypt($request->password);
        $tournaments = Tournament::create($input);
       
        return redirect()->back()->with('success', 'تمت الاضافة بنجاح');
    }

    public function editTournament(Request $request)
    {
        $checker = Tournament::find($request->tournament_id);
        
        $input = $request->all();
       
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
}
