@extends('layouts.app')

@section('title', 'Image Gallery')

@section('content')
<div class="page-inner">
    {{-- Page Header --}}
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Image Gallery</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            {{-- Use a route to the upload form if you have one --}}
            <a href="{{ route('image.upload') }}" class="btn btn-primary btn-round">Upload New Image</a>
        </div>
    </div>

    {{-- Success Message Alert --}}
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    {{-- Image Grid --}}
    <div class="row">
        @if ($images->isEmpty())
            <div class="col-12">
                <p class="text-muted">No images have been uploaded yet.</p>
            </div>
        @else
            @foreach ($images as $image)
                <div class="col-md-4 col-lg-3 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $image->image_path) }}" class="card-img-top" alt="{{ $image->title }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $image->title }}</h5>
                            <form action="{{ route('image.destroy', $image->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this image?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection