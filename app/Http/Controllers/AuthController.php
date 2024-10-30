<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginPage(){
        return view('pages.auth.Login');
    }

    public function checkLogin(Request $request){
        dd($request->all());
    }
}
