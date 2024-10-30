<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}