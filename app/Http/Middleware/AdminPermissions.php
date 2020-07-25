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

        if (in_array($role_id, $user->roles->pluck('id')->toArray())
            || $user->id == 1) {
            return $next($request);
        }
        
        if(count((auth()->guard('admin')->user()->teams)) != 0) {
           foreach(auth()->guard('admin')->user()->teams as $tea) {
                    return redirect()->route('teams', ['id', $tea->id])->withErrors('مرحبًا بك، قمت بتسجيل دخول كمدير فريق');

        } 
        } else {
            return redirect()->route('get.login')->withErrors('هذا الحساب خطأ أو غير موجود');
        }
        

    }
}
