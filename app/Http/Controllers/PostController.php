<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // Display all posts
    public function index()
    {
        return response()->json(Post::all());
    }

    // Show a single post
    public function show($id)
    {
        return response()->json(Post::findOrFail($id));
    }

    // Store a new post
    public function store(Request $request)
    {
        $post = Post::create($request->all());
        return response()->json($post, 201);
    }

    // Update a post
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return response()->json($post);
    }

    // Delete a post
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return response()->json(['message' => 'Post deleted']);
    }
}
