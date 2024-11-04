<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminPanelFunctionality extends Controller
{
    public function searchUser(Request $request){
        $serchterm = $request->search;
        $usersdetail = User::where('name', 'like', "%$serchterm%")->paginate(6);
        return view('pages.admin.Dashboard', compact('usersdetail'));        
    }
}