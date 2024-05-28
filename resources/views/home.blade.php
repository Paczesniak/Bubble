@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="music-player p-4 rounded" style=" width: 500px;">
            <div class="album-cover mb-3 text-center">
                @if ($song && $song->cover_image)
                    <img src="{{ asset('storage/' . $song->cover_image) }}" alt="{{ $song->title }}" class="img-fluid rounded">
                @else
                    <img src="{{ asset('default-cover.jpg') }}" alt="Default Cover" class="img-fluid rounded">
                @endif
            </div>
            <div class="text-center text-light">
                <h1>{{ $song ? $song->title : 'No Song Selected' }}</h1>
                <p>{{ $song ? $song->artist : '' }}</p>
            </div>
            @if ($song)
                <audio id="song" src="{{ asset('storage/' . $song->file_path) }}" controls class="w-100 mt-3"></audio>
            @else
                <p class="text-light">Please select a song to play.</p>
            @endif
        </div>
    </div>
@endsection
