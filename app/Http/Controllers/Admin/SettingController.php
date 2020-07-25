<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
   
    public function index()
    {

        $admins = Admin::all();


        return view('dashboard.settings', compact('admins'));
    
}


    public function editDetails(Request $request)
    {

        $checker = Admin::find($request->admin_id);

        $input = $request->all();

        
        if ($request->password) {
            $input['password'] = bcrypt($request->password);
        } else {
            $input['password'] = $checker->password;
        }

        $admins = $checker->update($input);

        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }


}
