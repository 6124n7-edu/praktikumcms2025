@extends('layouts.app')

@section('title', $post['title'])
    
@section('content')
    <h1>{{ $post['title'] }}</h1>
    <p>{{ $post['content'] }}</p>

    <a href="{{ url('/posts/' . $post['id'] . '/edit') }}">✏️ Edit</a> |
    <a href="{{ url('/posts/' . $post['id'] . '/delete') }}">🗑️ Hapus</a>
    <br><br>

    <a href="{{ url('/posts') }}">← Kembali ke daftar</a>
@endsection