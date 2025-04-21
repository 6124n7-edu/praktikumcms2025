@extends('layouts.app')

@section('title', 'Edit Artikel')

@section('content')
    <h1>Edit Artikel</h1>

    <form>
        Judul:<br>
        <input type="text" value="{{ $post['title'] }}"><br><br>
    
        Isi:<br>
        <textarea rows="4">{{ $post['content'] }}</textarea><br><br>

        <button type="submit" disabled>Simpan (hanya simulasi)</button>
    </form>

    <br>
    <a href="{{ url('/posts/' . $post['id']) }}">← Kembali ke detail</a>
@endsection