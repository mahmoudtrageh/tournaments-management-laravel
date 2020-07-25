<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public  function index()
    {
        return view('auth.auth');
    }
    
     public  function indexDash($id)
    {
        $id = $id;
        return view('auth.auth', compact('id'));
    }
    
    public function login(Request $request){
        
        $this->validate($request, [
            
            'email'=>'required',
            'password'=>'required',
        ] , [
            'email.required'=>'برجاء إدخال الإيميل',
            'password.required'=>'برجاء إدخال الرقم السري',
        ]);

     
        if (\Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])){


            return redirect()->route('dashboard-index');

            } else {

                return redirect()->route('get.login')->withErrors('برجاء التأكد من إسم الايميل والرقم السري');
            }
        }
        
        
        
         public function loginDash(Request $request, $id){
        
        $this->validate($request, [
            
            'email'=>'required',
            'password'=>'required',
        ] , [
            'email.required'=>'برجاء إدخال الإيميل',
            'password.required'=>'برجاء إدخال الرقم السري',
        ]);

     
        if (\Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])){


            return redirect()->route('dashboard-index-dash', ['id' =>$id]);

            } else {

                return redirect()->route('get.login.dash', ['id'=>$id])->withErrors('برجاء التأكد من إسم الايميل والرقم السري');
            }
        }
        

    public function logout(){

        auth()->guard('admin')->logout();
        return redirect()->route('site-index');

    }
    
    
     public function logoutSite(){

        auth()->guard('admin')->logout();
        return redirect()->route('site-index');

    }
}
