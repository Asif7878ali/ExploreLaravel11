<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function index()
    {   // this with method user is a function in Post Model i have write
        $postdetail = Post::where('viewable', '0')->with('user')->get();
        return view('pages.home.AllPostShow', compact('postdetail'));
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
        //  dd($request->all());
        try {
              // check image is Present
              if($request->hasFile('image')){
                  //behind the scene laravel automatically add a unique name of imagefile with extension.
                  // storage is facade Disk is which file system you upload a image local or public Put method accept two artument first is path second is file
                   $imageiwithpath  = Storage::disk('public')->put('/uploads/PostImage', $request->image);
                //    dd($imageiwithpath);
                   Post::create([
                        'post_image' => $imageiwithpath,
                        'title' => $request->title,
                        'description' => $request->description,
                        'viewable' => $request->post,
                        'person_who_create' => Auth::id()
                   ]);
                   session()->flash('success', 'Post Created Successfully');
                   return to_route('post.create');
              } else {
                session()->flash('error', 'Post not Created due to Server Error');
                return to_route('post.create');
              }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    

   
    public function show(string $id)
    {
          // Fetch posts created by the user with the specified ID
          $userPosts = Post::where('person_who_create', $id)->get();
        //   dd($userPosts);
        return view('pages.userpage.UserPostDashboard', compact('userPosts'));
    }

   
    public function edit(string $id)
    {
        $post = Post::find($id);
        // dd($post);
        if(! $post){
            abort('404', 'Record Not Found');
         } else{
            return view('pages.userpage.UpdatePost', compact('post'));
         }
    }

   
   
public function update(Request $request, string $id)
{
    $request->validate([
        'image' => 'nullable|image',
        'title' => 'required|string|max:50',
        'description' => 'required|string',
        'post' => 'required|boolean',
    ]);

    $post = Post::find($id);

    // Check if Post exists
    if (!$post) {
        abort(404, 'Record Not Found');
    }

    // Update the post attributes
    $post->title = $request->title;
    $post->description = $request->description;
    $post->viewable = $request->post;

    // Handle new image upload
    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($post->post_image && Storage::disk('public')->exists( $post->post_image)) {
            Storage::disk('public')->delete( $post->post_image);
        }

        // Store the new image and update the post_image attribute
           $imageiwithpath  = Storage::disk('public')->put('/uploads/PostImage', $request->image);
           $post->post_image = $imageiwithpath;
    }

    // Save all updates to the post
    $post->save();

    // Flash success message and redirect back
    session()->flash('success', 'Post Updated Successfully');
    return redirect()->back();

}

    public function destroy(string $id)
    {
        $post = Post::find($id);
        // dd($post);
        if (! $post) {
            abort('404', 'Record Not Found');
        } else {
           Storage::disk('public')->delete($post->post_image);
           $post->delete();
        }
        session()->flash('success', 'User Delete Successfully');
        return redirect()->back();
    }
}