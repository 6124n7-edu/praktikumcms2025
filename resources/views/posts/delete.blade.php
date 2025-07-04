@extends('layouts.app')

@section('title', 'Konfirmasi Hapus')

@section('content')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Yakin ingin menghapus artikel ini?</h3>
                <p class="text-muted">Tindakan ini tidak dapat diurungkan.</p>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5>{{ $post->title }}</h5>
                <p>{{ $post->content }}</p>
                <hr>

                {{-- Form to handle the deletion --}}
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    
                    <button type="submit" class="btn btn-danger">Ya, Hapus Artikel Ini</button>
                </form>

                {{-- Link to cancel and go back --}}
                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-secondary">Batal</a>
            </div>
        </div>
    </div>
@endsection