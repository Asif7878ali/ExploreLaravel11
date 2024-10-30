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
                return to_route('admindash');
            } else {
                $id = $user->user_id;
                // dd($id);
                return to_route('userProfile.show', ['id' => $id]);
            }
        } else {
            session()->flash('error', 'Invalid email or password'); 
            return to_route('loginpage');
        }
    }
}
