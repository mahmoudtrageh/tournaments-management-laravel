<?php
namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;


use App\Mail\ResetPassword;
use Illuminate\Http\Request;
use App\Admin;
use App\Code;
use Carbon\Carbon;
use Auth;


class AuthController extends Controller
{
    public function forget()

    {
        return view('site.reset-password');
    }

    public function check(Request $request)

    {

        $this->validate($request, [

            'email' => 'required',
        ],

            [
                'email.required' => 'برجاء إدخال البريد الإلكترونى',
            ]);
        if ($user = Admin::where('email', $request->email)->first()) {
            $email = $user->email;
            $code = str_random(5);
            if ($user->code) {
                $user->code()->update(['code' => $code, 'updated_at' => Carbon::now()]);
            }
            else
            {
                $user->code()->create(['code' => $code, 'updated_at' => Carbon::now()]);
            }
            \Mail::to($user)->send(new ResetPassword($code));
            return view('site.confirm-code', compact('email'));
        }
        session()->flash('error', 'البريد الإلكترونى غير مسجل');
        return redirect()->back();

    }

    public function code_confirmation(Request $request)

    {
//        dd($request->all());
        $email = ($request->email);

        if ($request->code == null) {
            session()->flash('error', 'برجاء إدخال الكود');
            return view('site.pages.auth.confirm-code', compact('email'));
        }

        if (!$request->email || !Admin::where('email', $request->email)->first() || !Admin::where('email', $request->email)->first()->code) {
            session()->flash('error', 'حدث خطأ , برجاء المحاوله ثانيه');
            return redirect()->route('site-forget');
        } else {

            $user = Admin::where('email', $request->email)->first();


            if ($request->code != $user->code->code) {
                return view('site.confirm-code', compact('email'));
            }

            if ($request->code == $user->code->code) {
                if ($user->code->updated_at->diffInHours() < 2) {
                    $user->code->update(['code' => str_random(5), 'updated_at' => Carbon::now()]);
                    return view('site.new-password', compact('email'));
                }
            }
            session()->flash('error', 'إنتهت صلاحيه الكود , برجاء المحاوله ثانيه');
            return redirect()->route('site-forget');

        }

    }

    public function pass_change(Request $request)

    {
        $email = $request->email;
        $v = validator($request->all(), [
            'password' => 'required|min:6|max:15',
            'password_confirmation' => 'required|same:password',
        ],

            [
                'password.required' => 'برجاء إدخال كلمه المرور',
                'password_confirmation.required' => 'برجاء إدخال تأكيد كلمه المرور',
                'password_confirmation.same' => 'كلمه المرور وتأكيدها لا تتطابق',
                'password.min' => 'كلمه المرور لا تقل عن 6 حروف',
                'password.max' => 'كلمه المرور لا تزيد عن 15 حوف',

            ]);

        if ($v->fails()) {
            return view('site.new-password', compact('email'))->withErrors($v);
        }

        if ($user = Admin::where('email', $request->email)->first()) {

            $user->update(['password' => bcrypt($request->password)]);
            Auth::login($user);
            return redirect()->intended(route('dashboard-index'));

        }
        session()->flash('error', 'حدث خطأ , برجاء المحاوله ثانيه');
        return redirect()->route('site-forget');
    }


}
