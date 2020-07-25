<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Role;
use App\Team;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminPermissions:1');
    }
    
    public function admins()
    {
        $admins = Admin::where('isSuper',0)->where('id', '!=', auth()->guard('admin')->user()->id)->get();
        $roles = Role::all();
        
        return view('dashboard.admins', compact('admins', 'roles'));
    }

    public function add(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'roles' => 'required',
        ],
            [
                'name.required' => 'برجاء أدخل الاسم',
                'email.required' =>'برجاء أدخل الايميل',
                'password.min' => 'برجاء أدخل الرقم السري',
                'roles.required' =>'برجاء أدخل الصلاحيات',
            ]);
            
        $input = $request->all();

        $input['password'] = bcrypt($request->password);

        $admin = Admin::create($input);

        
        if ($admin) {
            $admin->roles()->attach($request->roles);
            return redirect()->back()->with('success', 'تم التعديل بنجاح');
        }
        
        return redirect()->back()->with('sucess', 'تم التعديل بنجاح');
    }

    public function edit(Request $request)
    {
        
       
        $checker = Admin::find($request->admin_id);
        
        foreach($checker->teams as $team) {
                    $team_checker = Team::find($team->id);

        }
        
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'nullable|min:6|max:100',
            'roles' => 'required',
        ],
            [
                'name.required' => 'برجاء أدخل الاسم',
                'email.required' =>'برجاء أدخل الايميل',
                'password.min' => 'برجاء أدخل الرقم السري',
                'roles.required' =>'برجاء أدخل الصلاحيات',
            ]);
        $input = $request->all();
                $team_input = $request->all();
                
                
                 $team_input['manager_name'] = $request->name;
         $team_input['manager_email'] = $request->email;
$team_input['name'] = $team_checker->name;


        if ($request->password) {
            $input['password'] = bcrypt($request->password);
            $team_input['password'] = bcrypt($request->password);
        } else {
            $input['password'] = $checker->password;
            $team_input['password'] = $checker->password;
        }
        
                
        $admin = $checker->update($input);
        $teams = $team_checker->update($team_input);

        if ($admin) {
            $checker->roles()->sync($request->roles);
            return redirect()->back()->with('sucess', 'تمت الاضافة بنجاح');
        }
        return redirect()->back()->with('sucess', 'تمت الاضافة بنجاح');
    }

    public function delete(Request $request)
    {
        
        $checker = Admin::find($request->admin_id);
if(count($checker->roles) != 0) {
        $checker->roles()->detach();
}

        $checker_team = Team::where('manager_email', $checker->email)->delete();
        
        $checker->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }
}
