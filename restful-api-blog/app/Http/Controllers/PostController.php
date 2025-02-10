<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        return Post::with('user')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
    
        // Retrieve authenticated user using request()->user()
        $user = $request->user();
    
        // Check if the user exists
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    
        // Create the post using Eloquent
        $post = Post::create([
            'user_id' => $user->id,  // Ensuring we get the user ID
            'title' => $request->title,
            'content' => $request->content,
        ]);
    
        return response()->json(['message' => 'Post created successfully', 'post' => $post], 201);
    }
    

    public function show($id)
    {
        return Post::with('user')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
    
        // Retrieve authenticated user using request()->user()
        $user = $request->user();
    
        // Ensure the authenticated user is the owner of the post
        if (!$user || $post->user_id !== $user->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
    
        // Validate input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
    
        // Update post
        $post->update($request->only(['title', 'content']));
    
        return response()->json(['message' => 'Post updated successfully', 'post' => $post]);
    }
    

    public function destroy(Request $request, $id)
    {
        $post = Post::findOrFail($id);
    
        // Retrieve authenticated user using request()->user()
        $user = $request->user();
    
        // Ensure the authenticated user is the owner of the post
        if (!$user || $post->user_id !== $user->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
    
        // Delete post
        $post->delete();
    
        return response()->json(['message' => 'Post deleted successfully']);
    }
    
}
