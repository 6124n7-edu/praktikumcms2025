@extends('layouts.app')

@section('title', 'Buat Post Baru')

@section('content')
    <h1>Buat Post Baru</h1>

    {{-- Error validation --}}
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <div>
            <label>Judul:</label><br>
            <input type="text" name="title" value="{{ old('title') }}">
        </div>

        <div>
            <label>Konten:</label><br>
            <textarea name="content" rows="5">{{ old('content') }}</textarea>
        </div>

        <button type="submit">Simpan</button>
    </form>
@endsection