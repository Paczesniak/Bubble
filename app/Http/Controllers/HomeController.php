<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;

class HomeController extends Controller
{
    public function index(Request $request, $song_id = null)
    {
        $song = Song::find($song_id);
        return view('home', compact('song'));
    }
}
