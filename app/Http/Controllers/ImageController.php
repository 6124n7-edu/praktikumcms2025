<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function create()
    {
        return view('images.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        $image = Image::create([
            'title' => $request->title,
            'image_path' => $imagePath,
        ]);

        return view('images.create', ['image' => $image])->with('success', 'Gambar berhasil di upload');
    }

    // Untuk delete
    public function destroy(Image $image) // Route Model
    {
        // 1. Delete file image dari storage
        if (Storage::disk('public')->exists($image->image_path)) {
            Storage::disk('public')->delete($image->image_path);
        }

        // 2. Delete rekaman dari database
        $image->delete();

        return redirect()->back()->with('success', 'Gambar berhasil dihapus.');
    }

    public function index()
    {
        $images = Image::all();
        // You'll need to create this new view file: resources/views/images_list.blade.php
        return view('images.index', compact('images'));

        //return "Hello from Image Index!";
    }
}
