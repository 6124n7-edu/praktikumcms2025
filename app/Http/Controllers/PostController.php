<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // Display all posts
    public function index()
    {
        // 1.a. Retrieve data and sorted by ID from large to small ID
        $postsSortedById = Post::orderBy('id', 'desc')->get();

        // 1.b. Calculate the total data
        $totalUsers = User::count(); // Calculating total users

        //return response()->json(Post::all());
        $posts = Post::all();
        return view('posts.index', compact('posts', 'postsSortedById', 'totalUsers'));
    }

    // Show a single post
    public function show($id)
    {
        //return response()->json(Post::findOrFail($id));
        $post = Post::find($id);
        if (!$post) {
            abort(404);
        }
        return view('posts.show', compact('post'));
    }

    // Display form untuk buat post baru
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        //Melakukan validasi input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:10'
        ]);

        //Simpan ke database
        Article::create($validated);

        return redirect('/posts')->with('success', 'Post berhasil ditambah');
    }

    // Display form untuk edit post
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    public function delete($id)
    {
        $post = Post::find($id);
        return view('posts.delete', compact('post'));
    }

    //On hold:
    // Store a new post
    //public function store(Request $request)
    //{
        //$post = Post::create($request->all());
        //return response()->json($post, 201);
    //}

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
