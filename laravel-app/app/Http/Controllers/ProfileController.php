<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('auth.edit-profil');
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $validated=validator::make($request->all(),
        [
            'national_ID' => ['required','string'],
            'email' => ['required', 'string', 'email', 'max:255','unique:passengers,email'],
            'health_status' => ['required', 'string', 'max:30'],
            'phone' => ['required', 'integer'],
        ],[
            'name.required'=>'اكب الاسم ياذكى',
            'adrres.required'=>'اكتب الاميل ياعم الحج',
            'desc.required'=>'وكمان ناسى تكتب دا',
        ]);

        if($validated->fails()){
            return redirect()->back()->withErrors($validated)->withInput($request->all);
        }
        Test::findorfail($id)->update([
            'name'=>$request->name,
            'adrres'=>$request->adrres,
            'desc'=>$request->desc
        ]);
        return redirect(url('test'));


        // $request->user()->fill($request->validated());

        // if ($request->user()->isDirty('email')) {
        //     $request->user()->email_verified_at = null;
        // }

        // $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    // public function destroy(Request $request): RedirectResponse
    // {
    //     $request->validateWithBag('userDeletion', [
    //         'password' => ['required', 'current-password'],
    //     ]);

    //     $user = $request->user();

    //     Auth::logout();

    //     $user->delete();

    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return Redirect::to('/');
    // }
}
