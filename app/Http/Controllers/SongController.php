<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\UserSong;
use Illuminate\Support\Facades\Auth;

class SongController extends Controller
{
    public function index()
    {
        $songs = Song::paginate(10);
        return view('songs.index', compact('songs'));
    }

    public function create()
    {
        if (Auth::check()) {
            return view('songs.create');
        }
        return redirect()->route('songs.index')->with('error', 'You do not have permission to add a song.');
    }

    public function store(Request $request)
    {
        if (Auth::check()) {
            $request->validate([
                'title' => 'required|string|max:255',
                'artist' => 'required|string|max:255',
                'album' => 'required|string|max:255',
                'genre' => 'required|string|max:255',
                'duration' => 'required|integer',
                'music_file' => 'required|file|mimes:mp3|max:20480',
                'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $data = $request->all();
            $data['user_id'] = Auth::id();

            if ($request->hasFile('music_file')) {
                $data['file_path'] = $request->file('music_file')->store('music_files', 'public');
            }

            if ($request->hasFile('cover_image')) {
                $data['cover_image'] = $request->file('cover_image')->store('cover_images', 'public');
            }

            Song::create($data);

            return redirect()->route('songs.index')->with('success', 'Song added successfully.');
        }
        return redirect()->route('songs.index')->with('error', 'You do not have permission to add a song.');
    }

    public function show(Song $song)
    {
        return view('songs.show', compact('song'));
    }

    public function edit(Song $song)
    {
        if (Auth::check() && (Auth::id() === $song->user_id || Auth::user()->role == 'admin')) {
            return view('songs.edit', compact('song'));
        }
        return redirect()->route('songs.index')->with('error', 'You do not have permission to edit this song.');
    }

    public function update(Request $request, Song $song)
    {
        if (Auth::check() && (Auth::id() === $song->user_id || Auth::user()->role == 'admin')) {
            $request->validate([
                'title' => 'required|string|max:255',
                'artist' => 'required|string|max:255',
                'album' => 'required|string|max:255',
                'genre' => 'required|string|max:255',
                'duration' => 'required|integer',
                'music_file' => 'nullable|file|mimes:mp3|max:20480',
                'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $data = $request->all();

            if ($request->hasFile('music_file')) {
                $data['file_path'] = $request->file('music_file')->store('music_files', 'public');
            }

            if ($request->hasFile('cover_image')) {
                $data['cover_image'] = $request->file('cover_image')->store('cover_images', 'public');
            }

            $song->update($data);

            return redirect()->route('songs.index')->with('success', 'Song updated successfully.');
        }
        return redirect()->route('songs.index')->with('error', 'You do not have permission to update this song.');
    }

    public function destroy(Song $song)
{
    if (Auth::check() && (Auth::id() === $song->user_id || Auth::user()->role == 'admin')) {

        UserSong::where('song_id', $song->id)->delete();

        $song->delete();

        return redirect()->route('songs.index')->with('success', 'Song deleted successfully.');
    }

    return redirect()->route('songs.index')->with('error', 'You do not have permission to delete this song.');
}


    public function addToFavorites($songId)
    {
        $song = Song::findOrFail($songId);
        UserSong::create(['user_id' => Auth::id(), 'song_id' => $songId]);

        return redirect()->route('songs.index')->with('success', 'Song added to favorites.');
    }

    public function removeFromFavorites($songId)
    {
        $song = Song::findOrFail($songId);
        UserSong::where('user_id', Auth::id())->where('song_id', $songId)->delete();

        return redirect()->route('songs.index')->with('success', 'Song removed from favorites.');
    }

    public function favoriteSongs()
    {
        $favoriteSongs = UserSong::where('user_id', Auth::id())->with('song')->paginate(10);
        return view('songs.favorites', compact('favoriteSongs'));
    }
}
