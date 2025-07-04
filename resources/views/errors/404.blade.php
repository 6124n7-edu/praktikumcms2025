@extends('layouts.app')

@section('title', '404 - Page Not Found')

@section('content')
<div class="page-inner">
    <div class="d-flex align-items-center justify-content-center" style="min-height: 60vh;">
        <div class="text-center">
            <h1 class="fw-bold mb-3" style="font-size: 5rem;">404</h1>
            <h3 class="fw-bold mb-3">Oops! Page Not Found.</h3>
            <p class="text-muted mb-4">
                The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.
            </p>
            <a href="{{ route('posts.index') }}" class="btn btn-primary btn-round">Go to Dashboard</a>
        </div>
    </div>
</div>
@endsection