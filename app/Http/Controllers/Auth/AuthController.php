<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash; 
use App\Models\User; 
use Illuminate\Auth\Events\Registered; 
use App\Providers\RouteServiceProvider;



class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function authenticate(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    $user = User::where('email', $credentials['email'])->first();

    if (!$user) {
        return redirect()->back()->withErrors([
            'email' => 'The provided email is not registered.',
        ]);
    }

    if (!Hash::check($credentials['password'], $user->password)) {
        return redirect()->back()->withErrors([
            'password' => 'The provided password is incorrect.',
        ]);
    }

   
    Auth::login($user);

    return redirect()->route('dashboard')->with('success', 'Logged in successfully!');
}

    

    public function registerUser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('login')->with('success', 'Registered in successfully!');
    }
}