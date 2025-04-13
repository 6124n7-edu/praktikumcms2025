<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ini Edit</title>
</head>
<body>
    <h2>Edit Artikel</h2>

    <form>
        Judul:<br>
        <input type="text" value="{{ $post['title'] }}"><br><br>
    
        Isi:<br>
        <textarea rows="4">{{ $post['content'] }}</textarea><br><br>

        <button disabled>Simpan (hanya simulasi)</button>
    </form>

    <br>
    <a href="{{ url('/posts/' . $post['id']) }}">← Kembali ke detail</a>
</body>
</html>