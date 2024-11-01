<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        echo $request->search;
        // $usersdetail = User::all()->makeHidden(['password']);
        $usersdetail = User::paginate(6);
        // dd($usersdetail);
        return view('pages.admin.Dashboard', compact('usersdetail'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.auth.Registration');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cridentials = $request->validate([
            'name' => [
                'required',
                'string',
                'min:3',
                'max:20',
                'regex:/^[a-zA-Z\s]+$/'
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255'
            ],
            'address' => [
                'required',
                'string',
                'min:10',
                'max:255'
            ],
            'phoneNumber' => [
                'required',
                'digits:10',
                'regex:/^[6-9][0-9]{9}$/'
            ],
            'gender' => [
                'required',
                'in:male,female,other'
            ],
            'admin' => [
                'required',
                'boolean'
            ],
            'password' =>[
                'required',
                'min:4',
                'max:8'
            ]
        ]);
        //   dd($request->all());
        // add record to database
        User::create([
            'name' => $cridentials['name'],
            'email' => $cridentials['email'],
            'address' => $cridentials['address'],
            'number' => $cridentials['phoneNumber'],
            'gender' => $cridentials['gender'],
            'admin' => $cridentials['admin'],
            'password' => $cridentials['password']
        ]);

        session()->flash('success', 'Registration Created Successfully');
        // old way to redirect route
        // return redirect()->route('userProfile.create');
         // new way to redirect route add in laravel 10;
        return to_route('loginpage');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(Auth::check()){
            // dd(Auth::check());
            $user = User::find($id);
        // dd($user);
        if(! $user){
            abort('404', 'Record Not Found');
        } else{
            return view('pages.userpage.SpecificUser', compact('user'));
        }
        } else {
            abort('404', 'Not Authenticated');
        }
;
       
      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         // dd($id);
         $user = User::find($id);
         if(! $user){
            abort('404', 'Record Not Found');
         } else{
            return view('pages.auth.UpdateUser', compact('user'));
         }
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cridentials = $request->validate([
            'name' => [
                'required',
                'string',
                'min:3',
                'max:20',
                'regex:/^[a-zA-Z\s]+$/'
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255'
            ],
            'address' => [
                'required',
                'string',
                'min:10',
                'max:255'
            ],
            'phoneNumber' => [
                'required',
                'digits:10',
                'regex:/^[6-9][0-9]{9}$/'
            ],
            'gender' => [
                'required',
                'in:male,female,other'
            ],
            'admin' => [
                'required',
                'boolean'
            ],
            'password' =>[
                'required',
                'min:4',
                'max:8'
            ]
        ]);

        $user = User::find($id);
        if(! $user){
            abort('404', 'Record Not Found');
        } else {
           $user->update([
            'name' => $cridentials['name'],
            'email' => $cridentials['email'],
            'address' => $cridentials['address'],
            'number' => $cridentials['phoneNumber'],
            'gender' => $cridentials['gender'],
            'admin' => $cridentials['admin'],
            'password' => $cridentials['password']
           ]);
        }

        session()->flash('success', 'User Record Update Successfully');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if (! $user) {
            abort('404', 'Record Not Found');
        } else {
           $user->delete();
        }
        session()->flash('success', 'User Delete Successfully');
        return redirect()->back();
        
    }
}
