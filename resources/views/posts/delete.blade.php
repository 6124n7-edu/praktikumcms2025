<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ini Delete</title>
</head>
<body>
    <h2>Yakin ingin menghapus artikel ini?</h2>

    <strong>{{ $post['title'] }}</strong><br>
    {{ $post['content'] }}<br><br>

    <button disabled>Ya, hapus (hanya simulasi)</button>
    <br><br>
    <a href="{{ url('/posts/' . $post['id']) }}">→ Batal</a>
</body>
</html>