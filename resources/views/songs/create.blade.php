@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-white">Add New Song</h1>
        <form action="{{ route('songs.store') }}" method="POST" enctype="multipart/form-data" class="mt-3" id="addSongForm">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label text-white">Title:</label>
                <input type="text" name="title" id="title" class="form-control bg-dark text-white" required>
            </div>

            <div class="mb-3">
                <label for="artist" class="form-label text-white">Artist:</label>
                <input type="text" name="artist" id="artist" class="form-control bg-dark text-white" required>
            </div>

            <div class="mb-3">
                <label for="album" class="form-label text-white">Album:</label>
                <input type="text" name="album" id="album" class="form-control bg-dark text-white" required>
            </div>

            <div class="mb-3">
                <label for="genre" class="form-label text-white">Genre:</label>
                <input type="text" name="genre" id="genre" class="form-control bg-dark text-white" required>
            </div>

            <div class="mb-3">
                <label for="duration" class="form-label text-white">Duration (seconds):</label>
                <input type="number" name="duration" id="duration" class="form-control bg-dark text-white" required>
            </div>

            <div class="mb-3">
                <label for="music_file" class="form-label text-white">Music File:</label>
                <input type="file" name="music_file" id="music_file" class="form-control bg-dark text-white" required accept=".mp3">
            </div>

            <div class="mb-3">
                <label for="cover_image" class="form-label text-white">Cover Image:</label>
                <input type="file" name="cover_image" id="cover_image" class="form-control bg-dark text-white" accept=".jpg,.jpeg,.png">
            </div>

            <button type="submit" class="btn btn-primary">Add Song</button>
        </form>
    </div>

    <script>
        document.getElementById('addSongForm').addEventListener('submit', function(event) {
            var form = event.target;
            var title = form.title.value.trim();
            var artist = form.artist.value.trim();
            var album = form.album.value.trim();
            var genre = form.genre.value.trim();
            var duration = form.duration.value;

            if (title === '' || artist === '' || album === '' || genre === '' || duration <= 0) {
                event.preventDefault();
                alert('An error occurred in an addition field');
            }

            var musicFile = form.music_file.files[0];
            if (musicFile && musicFile.size > 20480000) {
                event.preventDefault();
                alert('Music file must be less than 20MB.');
            }

            var coverImage = form.cover_image.files[0];
            if (coverImage && coverImage.size > 2048000) {
                event.preventDefault();
                alert('Cover image must be less than 2MB.');
            }
        });
    </script>
@endsection
