<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditProfileController extends Controller
{

    public function profile()
    {
        return view('auth.edit-profile');
    }



    public function editprofile(Request $request)
    {

        $id=$request->id;
        return $request;
        $validated=validator::make($request->all(),
        [
            'profession' => ['required','string'],
            'email' => ['required', 'string', 'email','unique:passengers,email'],
            'health_status' => ['required', 'string', 'max:30'],
            'phone' => ['required', 'integer'],
        ],[
            'name.required'=>'اكب الاسم ياذكى',
            'adrres.required'=>'اكتب الاميل ياعم الحج',
            'desc.required'=>'وكمان ناسى تكتب دا',
        ]);

        if($validated->fails()){
            return 'fails';
            // return redirect()->back()->withErrors($validated)->withInput($request->all);
        }
        Test::findorfail($id)->update([
            'profession'=>$request->profession,
            'email'=>$request->email,
            'health_status'=>$request->health_status,
            'phone'=>$request->phone
        ]);
        return 'true';

        
    }
}
