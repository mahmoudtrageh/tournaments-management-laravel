<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use App\Tournament;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
   
    public function index($id)
    {
        $groups = Tournament::find($id)->groups;
       
        return view('dashboard.groups', compact('groups', 'id'));
    }


    public function addGroup(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'tournament_id' => 'required',
            'min_birth' => 'required',
            'max_birth' => 'required',
            'max_players' => 'required',
        ],
            [
                'name.required' =>'please add name',
                'tournament_id.unique' => 'please add name',
                'min_birth.required' => 'please add name',
                'max_birth.required' => 'please add name',
                'max_players.required' => 'please add name',
               
            ]);
        $input = $request->all();
       
        $groups = Group::create($input);
        return redirect()->back()->with('success', 'تمت الإضافة بنجاح');
    }

    public function editGroup(Request $request)
    {

        $checker = Group::find($request->group_id);

        $input = $request->all();

        $groups = $checker->update($input);

        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }

    public function deleteGroup(Request $request)
    {
        $checker = Group::find($request->group_id);
        $checker->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }

}
