@extends('layouts.app')

@section('title', 'Konfirmasi Hapus')

@section('content')
    <h1>Yakin ingin menghapus artikel ini?</h1>

    <strong>{{ $post['title'] }}</strong><br>
    {{ $post['content'] }}<br><br>

    <button disabled>Ya, hapus (hanya simulasi)</button>
    <br><br>
    <a href="{{ url('/posts/' . $post['id']) }}">→ Batal</a>
@endsection