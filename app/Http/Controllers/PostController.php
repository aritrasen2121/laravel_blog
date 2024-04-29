<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class PostController extends Controller
{
    
    public function index()
    {
        return view('components.post');
    }
    
    public function create(Request $request)
    {
        $user = $request->user();
        $post = new Post;
        $post->title=$request->title;
        $post->description=$request->description;
        $user->post()->save($post);

        return redirect()->route('dashboard')
        ->with('success', 'post added successfully.');
    }
    
    public function getAllPost()
    {
        //
        $posts=Post::paginate(6);
        return view('dashboard',['posts' => $posts]);
    }

    public function userPost(Request $request)
    {
        $userid= $request->user()->id;
        $posts=Post::where('user_id',$userid)->paginate(6);
        return view('mypost',['posts' => $posts]);
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $post=Post::find($id);
        return view('components.editpost',['post'=>$post]);
    }
    public function update(Request $request, $id)
    {
        $post= Post::find($id);
        $post->title=$request->title;
        $post->description=$request->description;
        $post->save();

        return redirect()->route('dashboard')
        ->with('success', 'post updated successfully.');
        
    }
    public function destroy($id)
    {
        Post::destroy($id);

        return redirect(route('dashboard'))->with('status','deleted');
    }
}
