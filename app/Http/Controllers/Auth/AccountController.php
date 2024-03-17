<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash; 
use App\Models\User; 
use Illuminate\Auth\Events\Registered; 
use App\Providers\RouteServiceProvider;
class AccountController extends Controller
{
    public function view()
    {
        $user = Auth::user(); 
        return view('Auth.Accountmanagment', ['user' => $user]); 
    }
    public function updatePassword(Request $request)
    {    
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);
    
        $user = Auth::user();
    
        if (Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with('success', 'Password updated successfully.');
        }
    
        return redirect()->back()->withErrors(['current_password' => 'The provided password does not match your current password.']);
    }
    
    public function deleteAccount()
    {
        $user = Auth::user();
        $user->delete();
        Auth::logout(); // Logout the user after deleting the account
        return redirect()->route('logout')->with('success', 'Your account has been deleted.');
    }
}
