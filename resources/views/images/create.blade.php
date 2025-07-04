@extends('layouts.app')

@section('title', 'Upload New Image')

@section('content')
<div class="page-inner">
    {{-- Page Header --}}
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Upload New Image</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <a href="{{ route('image.index') }}" class="btn btn-secondary btn-round">View All Images</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Image Upload Form</div>
                </div>
                <div class="card-body">
                    {{-- Validation Errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Success Message --}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Upload Form --}}
                    <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Image Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Choose Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Upload Image</button>
                    </form>
                </div>
            </div>
        </div>
        
        {{-- Image Preview Section --}}
        @if (isset($image))
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Last Uploaded Image</div>
                    </div>
                    <div class="card-body">
                        <p><strong>{{ $image->title }}</strong></p>
                        <img src="{{ asset('storage/' . $image->image_path) }}" class="img-fluid rounded">
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection