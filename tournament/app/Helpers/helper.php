<?php

if (!function_exists('adminPermission')) {
    function adminPermissions($role_id)
    {
        $user = auth()->guard('admin')->user();
        if (in_array($role_id, $user->roles->pluck('id')->toArray())
            || $user->isSuper) {
            return true;
        }
        return false;
    }
}

if (!function_exists('add_file')) {
    function add_file($request_file_name, $destination)
    {
        if ($file = $request_file_name) {
            $name = rand(0000, 9999) . time() . '.' . $file->getClientOriginalExtension();
            $file->move($destination, $name);
        }
        return $name;
    }
}

if (!function_exists('update_file')) {
    function update_file($request_file_name, $checker, $database_name, $destination)
    {
        if ($file = $request_file_name) {
            @unlink($destination . '/' . $checker->$database_name);
            $name = rand(0000, 9999) . time() . '.' . $file->getClientOriginalExtension();
            $file->move($destination, $name);
        }
        return $name;
    }
}

if (!function_exists('delete_file')) {
    function delete_file($checker, $database_name, $destination)
    {
        @unlink($destination . '/' . $checker->$database_name);
    }
}

if (!function_exists('header_detail')) {
    function header_detail()
    {
        $header_detail = \App\HeaderDetail::first();
        return $header_detail;
    }
};

if (!function_exists('socials')) {
    function socials()
    {
        $socials = \App\Social::first();
        return $socials;
    }
};

if (!function_exists('contact')) {
    function contact()
    {
        $contact = \App\Contact::first();
        return $contact;
    }
};


if (!function_exists('notification')) {
    function notification()
    {
        $current_admin = auth()->guard('admin')->user()->id;
        $notification = \App\Notification::where('read_at', NULL)->where('notifiable_id', $current_admin)->get();
        return $notification;
    }

}

if (!function_exists('messages')) {
    function messages()
    {
        $messages = \App\Message::where('status', 0)->get();
        return $messages;
    }

}


