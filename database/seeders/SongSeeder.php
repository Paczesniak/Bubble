<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Song;

class SongSeeder extends Seeder
{
    public function run()
    {
        Song::create([
            'title' => 'BFF',
            'artist' => 'bambi, Young Leosia, PG$',
            'album' => 'Singiel',
            'genre' => 'Rap',
            'duration' => 300,
            'file_path' => 'music_files/0L1KvBksnODgTTsPciQh3H3PcerOh0lIkVcUEMRX.mp3',
            'cover_image' => 'cover_images/3lTfb0LA1nAGCJq5v1JR0duZIffaxv8Jr6ea1Ixp.jpg',
        ]);

        Song::create([
            'title' => 'Harry Potter & Kamilski',
            'artist' => 'Harry Potter & Kamilski',
            'album' => 'Singiel',
            'genre' => 'Rap',
            'duration' => 240,
            'file_path' => 'music_files/5J2hjTy9QSuyp6cWfqAxRPTyMMmBni9fRjozbmij.mp3',
            'cover_image' => 'cover_images/4U6jlkQWNHyyAwMIRtaD5Gm2OEI9f7YsGlt5IclE.jpg',
        ]);


    }
}
