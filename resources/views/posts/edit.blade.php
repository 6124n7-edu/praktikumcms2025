@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Edit Post</h3>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                {{-- This link should probably go to the specific post or the index --}}
                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary btn-round">Kembali ke Post</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                {{-- Use the route name for the update action --}}
                <form action="{{ route('posts.update', $post->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Judul:</label>
                        {{-- Add the 'name' attribute --}}
                        <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Isi:</label>
                        {{-- Add the 'name' attribute --}}
                        <textarea class="form-control" id="content" name="content" rows="4">{{ $post->content }}</textarea>
                    </div>

                    {{-- Enable the button --}}
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
@endsection