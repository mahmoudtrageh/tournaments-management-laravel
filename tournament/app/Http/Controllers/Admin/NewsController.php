<?php

namespace App\Http\Controllers\Admin;

use App\SiteNew;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
     public function index()
    {
        $news = SiteNew::all();
        
        return view('dashboard.news', compact('news'));
    }

    public function addNew(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'date' => 'required',
            'text' => 'required',

        ],
            [
                'title.required' =>'please add name',
                'date.unique' => 'please add name',
                'text.required' => 'please add name',
               
            ]);
        $input = $request->all();

        $news = SiteNew::create($input);
       
        return redirect()->back()->with('success', 'تمت الاضافة بنجاح');
    }

    public function editNew(Request $request)
    {
        $checker = SiteNew::find($request->new_id);
        
        $input = $request->all();
       
        $news = $checker->update($input);
     
        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }

    public function deleteNew(Request $request)
    {
        $checker = SiteNew::find($request->new_id);
        $checker->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }

    public function updateStatus(Request $request)
    {


        $user = SiteNew::find($request->id);

        $user->status = $request->status;
        $user->save();
        return response()->json(["status" => "ok", 'user' => $user]);
    }
}
