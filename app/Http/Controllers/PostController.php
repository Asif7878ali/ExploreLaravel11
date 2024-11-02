<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        //
    }

   
    public function create()
    {
        return view('pages.userpage.CreatePost');
    }

   
    public function store(Request $request)
    {
       
        $request->validate([
            'image' => 'required|image',
            'title' => 'required|string|max:50',
            'description' => 'required|string',
            'post' => 'required|boolean',
        ]);

         dd($request->all());
    }

    

   
    public function show(string $id)
    {
        //
    }

   
    public function edit(string $id)
    {
        //
    }

   
    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
