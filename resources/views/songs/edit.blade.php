@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-white">Edit Song</h1>
        <form action="{{ route('songs.update', $song->id) }}" method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label text-white">Title:</label>
                <input type="text" name="title" id="title" value="{{ $song->title }}" class="form-control bg-dark text-white" required>
            </div>

            <div class="mb-3">
                <label for="artist" class="form-label text-white">Artist:</label>
                <input type="text" name="artist" id="artist" value="{{ $song->artist }}" class="form-control bg-dark text-white" required>
            </div>

            <div class="mb-3">
                <label for="album" class="form-label text-white">Album:</label>
                <input type="text" name="album" id="album" value="{{ $song->album }}" class="form-control bg-dark text-white" required>
            </div>

            <div class="mb-3">
                <label for="genre" class="form-label text-white">Genre:</label>
                <input type="text" name="genre" id="genre" value="{{ $song->genre }}" class="form-control bg-dark text-white" required>
            </div>

            <div class="mb-3">
                <label for="duration" class="form-label text-white">Duration (seconds):</label>
                <input type="number" name="duration" id="duration" value="{{ $song->duration }}" class="form-control bg-dark text-white" required>
            </div>

            <div class="mb-3">
                <label for="music_file" class="form-label text-white">Music File:</label>
                <input type="file" name="music_file" id="music_file" class="form-control bg-dark text-white">
            </div>

            <div class="mb-3">
                <label for="cover_image" class="form-label text-white">Cover Image:</label>
                <input type="file" name="cover_image" id="cover_image" class="form-control bg-dark text-white">
            </div>

            <button type="submit" class="btn btn-primary ">Update Song</button>
        </form>
    </div>
@endsection
