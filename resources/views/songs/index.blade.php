@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5 mx-auto w-50">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="text-white">Songs</h1>
            @if (Auth::check())
                <a href="{{ route('songs.create') }}" class="btn btn-success">Add New Song</a>
            @endif
        </div>
        <div class="list-group">
            @foreach ($songs as $song)
                <div class="list-group-item d-flex justify-content-between align-items-center bg-dark">
                    <div class="d-flex align-items-center">
                        @if ($song->cover_image)
                            <img src="{{ asset('storage/' . $song->cover_image) }}" alt="{{ $song->title }}" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                        @else
                            <img src="{{ asset('default-cover.jpg') }}" alt="{{ $song->title }}" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                        @endif
                        <div class="ms-3 text-white">
                            <h5>{{ $song->title }}</h5>
                            <p>{{ $song->artist }}</p>
                            <p>Added on: {{ $song->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('home', ['song_id' => $song->id]) }}" class="btn btn-primary">Play</a>
                        @if (Auth::check())
                            @php
                                $isFavorite = Auth::user()->favoriteSongs->contains($song->id);
                            @endphp
                            @if ($isFavorite)
                                <form action="{{ route('songs.removeFromFavorites', $song->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-warning">Nice</button>
                                </form>
                            @else
                                <form action="{{ route('songs.addToFavorites', $song->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-info">Bad</button>
                                </form>
                            @endif
                        @endif
                        @if (Auth::check() && (Auth::user()->role == 'admin' || Auth::id() == $song->user_id))
                            <a href="{{ route('songs.edit', $song->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('songs.destroy', $song->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-3">
            {{ $songs->links() }}
        </div>
    </div>
@endsection
