@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5 mx-auto w-50">
        <h1 class="text-white">Favorite Songs</h1>
        <div class="list-group">
            @foreach ($favoriteSongs as $favorite)
                <div class="list-group-item d-flex justify-content-between align-items-center bg-dark">
                    <div class="d-flex align-items-center">
                        @if ($favorite->song->cover_image)
                            <img src="{{ asset('storage/' . $favorite->song->cover_image) }}" alt="{{ $favorite->song->title }}" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                        @else
                            <img src="{{ asset('default-cover.jpg') }}" alt="{{ $favorite->song->title }}" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                        @endif
                        <div class="ms-3 text-white">
                            <h5>{{ $favorite->song->title }}</h5>
                            <p>{{ $favorite->song->artist }}</p>
                            <p>Added on: {{ $favorite->song->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('home', ['song_id' => $favorite->song->id]) }}" class="btn btn-primary">Play</a>
                        <form action="{{ route('songs.removeFromFavorites', $favorite->song->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-warning">Remove from Favorites</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-3">
            {{ $favoriteSongs->links() }}
        </div>
    </div>
@endsection
