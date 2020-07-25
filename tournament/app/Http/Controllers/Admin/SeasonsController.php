<?php

namespace App\Http\Controllers\Admin;

use App\Season;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeasonsController extends Controller
{
   
    public function index()
    {

        $seasons = Season::all();
        
        return view('dashboard.seasons', compact('seasons'));
    }

    public function addSeason(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'start' => 'required',
            'end' => 'required',
            'max' => 'required',
        ],
            [
                'name.required' =>'من فضلك قم بإدخال إسم الموسم',
                'start.required' => 'من فضلك قم بإدخال تاريخ بدء الموسم',
                'end.required' => 'من فضلك قم بإدخال تاريخ نهاية الموسم',
                'max.required' => 'من فضلك قم بإدخال الحد الأقصي للاعبين',
            ]);
        $input = $request->all();
        
        $start_date = $request->start;
                $end_date = $request->end;

        if($start_date > $end_date) {
                    return redirect()->back()->with('error', 'لا يمكن إضافة تاريخ نهاية موسم قبل تاريخ البداية');

        }

        $input['password'] = bcrypt($request->password);
        $seasons = Season::create($input);
       
        return redirect()->back()->with('success', 'تمت الاضافة بنجاح');
    }

    public function editSeason(Request $request)
    {
        $checker = Season::find($request->season_id);
        
        $input = $request->all();
       
        $seasons = $checker->update($input);
     
        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }

    public function deleteSeason(Request $request)
    {
        $checker = Season::find($request->season_id);
        $checker->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }

    public function updateStatus(Request $request)
    {

        $seasons = Season::all();
        $user = Season::find($request->id);

       foreach($seasons as $season) {
          if($season->status == 1 && $request->status == 1) {
            return response()->json(["status" => "not ok", 'user' => $user]);
        } 
    }
        $user->status = $request->status;
    
        $user->save();
        return response()->json(["status" => "ok", 'user' => $user]);
    }
}
