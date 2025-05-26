@extends('layouts.app')

@section('title', 'Daftar Post')
    
@section('content')
    <h1>Daftar Post</h1>

    <a href="{{ route('posts.create') }}">+ Tambah Post</a>

    @if(count($posts) > 0)
        <ul>
            @foreach ($posts as $post)
                <li>
                    <a href="{{ url('/posts/' . $post['id']) }}">{{ $post['title'] }}</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>Tidak ada artikel.</p>
    @endif
@endsection