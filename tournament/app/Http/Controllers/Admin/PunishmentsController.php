<?php


namespace App\Http\Controllers\Admin;

use App\Punishment;
use App\Player;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PunishmentsController extends Controller
{
    public function index()
    {
        $punishments = Punishment::all();
        $players = Player::all();

        return view('dashboard.punishments', compact('punishments', 'players'));
    }

    public function addPunishment(Request $request)
    {

        $this->validate($request, [
            'player_id' => 'required',
            'date' => 'required',
            'text' => 'required',

        ],
            [
                'player_id.required' =>'please add name',
                'date.unique' => 'please add name',
                'text.required' => 'please add name',
               
            ]);
        $input = $request->all();

        $punishments = Punishment::create($input);
       
        return redirect()->back()->with('success', 'تمت الاضافة بنجاح');
    }

    public function editPunishment(Request $request)
    {
        $checker = Punishment::find($request->punishment_id);
        
        $input = $request->all();
       
        $punishments = $checker->update($input);
     
        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }

    public function deletePunishment(Request $request)
    {
        $checker = Punishment::find($request->punishment_id);
        $checker->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }

}