<!DOCTYPE html>
<html>
<head>
    <title>All Images</title>
    <style>
        .image-item {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .image-item img {
            max-width: 150px;
            height: auto;
        }
    </style>
</head>
<body>
    <h1>All Uploaded Images</h1>

    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    @if($images->isEmpty())
        <p>No images uploaded yet.</p>
    @else
        @foreach($images as $image)
            <div class="image-item">
                <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->title }}">
                <div>
                    <h3>{{ $image->title }}</h3>
                    <p>Path: {{ $image->image_path }}</p>

                    <form action="{{ route('image.destroy', $image->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this image?');">
                        @csrf
                        @method('DELETE') {{-- spoofs - DELETE method --}}
                        <button type="submit" style="background-color: red; color: white; padding: 5px 10px; border: none; cursor: pointer;">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif

    <hr>
    <p><a href="{{ route('image.upload') }}">Upload New Image</a></p>

</body>
</html>