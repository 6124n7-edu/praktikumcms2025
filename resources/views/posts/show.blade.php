@extends('layouts.app')

@section('title', $post['title'])

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">{{ $post['title'] }}</h3>
                    </div>
                <div class="ms-md-auto py-2 py-md-0">
                    <a href="{{ url('/posts/' . $post['id'] . '/edit') }}"
                        class="btn btn-label-info btn-round me-2">✏️ Edit</a>
                    <a href="{{ url('/posts/' . $post['id'] . '/delete') }}"
                        class="btn btn-label-info btn-round me-2">🗑️ Hapus</a>
                    <a href="{{ url('/posts/' . $post['id']) }}"
                        class="btn btn-primary btn-round">Kembali ke List</a>
                    </div>
                </div>

            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <p class="op-7 mb-2">{{ $post['content'] }}</p>
                </div>
            </div>
        </div>
@endsection
