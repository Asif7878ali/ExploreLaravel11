<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginPage(){
        return view('pages.auth.Login');
    }

    public function checkLogin(Request $request){
        // dd($request->all());
         // Validate the login input
         $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $credentials['email'])->first();
        // dd($user);
        if($user && $user->password === $credentials['password']){
             Auth::login($user);

             if ($user->admin) {
                return to_route('userProfile.index');
            } else {
                // dd($id);
                return to_route('userProfile.show', $user->user_id);
            }
        } else {
            session()->flash('error', 'Invalid email or password'); 
            return to_route('loginpage');
        }
    }

    public function logout(Request $request){
        // dd($request);
        Auth::logout();
         // Invalidate the session to prevent session fixation
         $request->session()->invalidate();

         // Regenerate the CSRF token to prevent reuse
         $request->session()->regenerateToken();

         session()->flash('success', 'Logged out successfully');
 
         // Redirect to the login or home page
         return to_route('loginpage');
    }
}
