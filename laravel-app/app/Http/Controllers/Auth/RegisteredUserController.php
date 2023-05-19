<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\support\facades\Validator;
use Illuminate\View\View;
use App\Notifications\NotificationPayment;
use Illuminate\Support\Facades\Notification;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_Name' => ['required', 'string', 'max:10'],
            'last_Name' => ['required', 'string', 'max:10'],
            'national_ID' => ['required', 'integer','digits_between:14,14','unique:passengers,national_ID'],
            'email' => ['required', 'string', 'email', 'max:255','unique:passengers,email'],
            'gender' => ['required', 'string', 'max:10'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'health_status' => ['required', 'string', 'max:30'],
            'date_of_birth' => ['required', 'string', 'max:30'],
            'phone' => ['required', 'integer','digits_between:11,11'],
            'profession' => ['required', 'string'],

        ],[
            
        ]);

        $user=User::create([
            'national_ID'=>$request ->national_ID,
            'first_Name'=>$request ->first_Name,
            'last_Name'=>$request ->last_Name,
            'gender'=>$request ->gender,
            'password'=>Hash::make($request ->password),
            'email'=>$request ->email,
            'health_status'=>$request ->health_status,
            'date_of_birth'=>$request ->date_of_birth,
            'phone'=> $request ->phone,
            'profession'=> $request ->profession
        ]);

        event(new Registered($user));

        Notification::send($user,new NotificationPayment($massag="you are new here"));

        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }
}
