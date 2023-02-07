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
use Illuminate\View\View;
use Propaganistas\LaravelPhone\Casts\RawPhoneNumberCast;
use Propaganistas\LaravelPhone\Casts\E164PhoneNumberCast;

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
    public function store(Request $request): RedirectResponse
    {
        if(strpos($request->email, '@') !== false){
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'tel'=> null,
                'password' => Hash::make($request->password),
            ]);
    
        } else{
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required | numeric | digits_between:8,11','unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
            $user = User::create([
                'name' => $request->name,
                'email' => null,
                'tel' => $request->email,
                'password' => Hash::make($request->password),
            ]);

        }

       
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
