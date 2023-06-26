<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\support\facades\Validator;
use App\Models\User;
use App\Models\Transaction;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit()
    {
        $user= User::find(auth()->user()->id);
        $BusQR=Transaction::where('user_id','=',auth()->user()->id)
        ->where('ticket_id','=',NULL)
        ->get();
        


        return view('auth.edit-profil',['user'=>$user,'BusQR'=>$BusQR]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $id=$request->id;
        $validated=validator::make($request->all(),
        [
            'profession' => ['required','string'],
            'email' => ['required', 'string', 'email', 'max:255','unique:passengers,email'],
            'health_status' => ['required', 'string', 'max:30'],
            'phone' => ['required', 'integer','unique:passengers,phone'],
        ],[

        ]);

        if($validated->fails()){
            return redirect()->back()->withErrors($validated)->withInput($request->all);
        }
        User::findorfail($id)->update([
            'profession'=>$request->profession,
            'email'=>$request->email,
            'health_status'=>$request->health_status,
            'phone'=>$request->phone
            
        ]);

        // $request->user()->fill($request->validated());

        // if ($request->user()->isDirty('email')) {
        //     $request->user()->email_verified_at = null;
        // }

        // $request->user()->save();

        // return redirect(url('/profile'))->with('status', 'profile-updated');
        return redirect(url('/profile'));

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
