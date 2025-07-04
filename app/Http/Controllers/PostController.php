<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log; // Logging -> Import Library
//use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();

        // Return the correct view and pass the $posts variable to it.
        return view('posts.index', compact('posts'));
    }
    
    // Display all posts
    public function list()
    {
        // 1.a. Retrieve data and sorted by ID from large to small ID
        $postsSortedById = Post::orderBy('id', 'desc')->get();

        // 1.b. Calculate the total data
        $totalUsers = User::count(); // Calculating total users

        //return response()->json(Post::all());
        $posts = Post::all();
        return view('posts.list', compact('posts', 'postsSortedById', 'totalUsers'));
    }

    // Show a single post
    public function show($id)
    {
        //return response()->json(Post::findOrFail($id));
        //$post = Post::find($id);
        //if (!$post) {
        //    abort(404);
        //}
        
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function customShow($id)
    {
        try {
            Log::info('Mencoba fetch post dengan ID: ' . $id); // ✅ Logging -> info seblum coba

            $post = Post::findOrFail($id);
            return view('posts.show', compact('post'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::error('Post tidak ditemukan dengan ID: ' . $id); // ❌ Logging -> error jika posting tdk ada

           abort(404); // Laravel default 404 error
        }
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
        Post::create($validated);

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
        // 1. Find the post
        $post = Post::findOrFail($id);

        // 2. Validate the incoming data (same as store)
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:10',
        ]);

        // 3. Update the post with validated data
        $post->update($validated);

        // 4. Redirect back to the post with a success message
        return redirect()->route('posts.show', $post->id)->with('success', 'Post berhasil diperbarui!');
    }

    // Delete a post
    public function destroy($id)
    {
        // 1. Find the post or fail
        $post = Post::findOrFail($id);

        // 2. Delete the post
        $post->delete();

        // 3. Redirect to the index page with a success message
        return redirect()->route('posts.index')->with('success', 'Post berhasil dihapus!');
    }
}
