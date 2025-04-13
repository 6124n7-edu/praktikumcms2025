<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ini Show</title>
</head>
<body>
    <h1>{{ $post['title'] }}</h1>
    <p>{{ $post['content'] }}</p>

    <a href="{{ url('/posts/' . $post['id'] . '/edit') }}">✏️ Edit</a> |
    <a href="{{ url('/posts/' . $post['id'] . '/delete') }}">🗑️ Hapus</a>
    <br><br>
    <a href="{{ url('/posts') }}">← Kembali ke daftar</a>
</body>
</html>