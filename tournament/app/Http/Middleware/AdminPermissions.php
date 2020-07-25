<?php

namespace App\Http\Middleware;

use Closure;

class AdminPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role_id)
    {
        

        
               $user = auth()->guard('admin')->user();


        foreach($user->roles as $us) {

      

        if (in_array($role_id, $user->roles->pluck('id')->toArray())
            || $us->id == 1) {
            return $next($request);
        } else 


        if($us->id == 2 && !in_array(1, $user->roles->pluck('id')->toArray()) ) {
        
        
        
        if(count((auth()->guard('admin')->user()->teams)) != 0 || count((auth()->guard('admin')->user()->tournaments)) != 0) {
            
            if($request->route('id') == "4") {
            
          foreach(auth()->guard('admin')->user()->teams as $tea) {
                    return redirect()->route('teams', ['id', $tea->id])->withErrors('مرحبًا بك، قمت بتسجيل دخول كمدير فريق');
          }

        } 
        
        return redirect()->route('site-index');
        
            }
        } // end rol id 2 

    

       else if($us->id ==3 && !in_array(1, $user->roles->pluck('id')->toArray())) {

        foreach(auth()->guard('admin')->user()->tournaments as $tour) {
                    return redirect()->route('tournaments', ['id', $tour->id])->withErrors('مرحبًا بك، قمت بتسجيل دخول كمدير بطولة');

        } 

        } else {
            return redirect()->route('get.login')->withErrors('هذا الحساب خطأ أو غير موجود');
        }

        

    } // end main foreach
}
}
