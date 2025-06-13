<!DOCTYPE html>
<html lang="en">

<head>
    <title>Upload Gambar</title>
</head>

<body>
    <h2>Form Upload Gambar</h2>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Upload -->
    <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Judul:</label><br>
        <input type="text" name="title"><br><br>

        <label>Pilih Gambar:</label><br>
        <input type="file" name="image"><br><br>

        <button type="submit">Upload</button>
    </form>

    <!-- Preview Gambar -->
    @if (isset($image))
        <h3>Gambar yang baru diupload:</h3>
        <p><strong>{{ $image->title }}</strong></p>
        <img src="{{ asset('storage/' . $image->image_path) }}" width="200">
    @endif

    <hr>
    {{-- Link to your new images listing page --}}
    <p><a href="{{ route('image.index') }}">View All Uploaded Images</a></p>

</body>
</html>
