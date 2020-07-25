<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;

class NotificationsController extends Controller

{
    // New User
    public function get_notifications()
    {
        return auth()->guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\RegisterTeam');
    }

    public function read(Request $request)
    {

        // dd($request->all());
        \Auth::guard('admin')->user()->unreadnotifications->MarkAsRead();
        return response()->json(["status" => "ok"]);
    }

    public function notifications ()
    {

        $notifications = Notification::paginate(7);

        return view('admin.notifications', compact('notifications'));
    }

    public function deleteNotification(Request $request)
    {
        $checker = Notification::find($request->noti_id);
        $checker->delete();
        return redirect()->back()->with('success', 'deleted');
    }

    
}
