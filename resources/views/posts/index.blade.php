<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ini index</title>
</head>
<body>
    <h2>Daftar Post</h2>
    <ul>
    @foreach ($posts as $post)
        <li>
            <a href="{{ url('/posts/' . $post['id']) }}">{{ $post['title'] }}</a>
        </li>
    @endforeach
    </ul>
</body>
</html>