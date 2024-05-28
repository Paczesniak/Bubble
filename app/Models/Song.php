<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'artist', 'album', 'genre', 'duration', 'file_path', 'cover_image', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // app/Models/Song.php

public function favoritedBy()
{
    return $this->belongsToMany(User::class, 'user_songs', 'song_id', 'user_id')->using(UserSong::class);
}

// app/Models/Song.php

public function getIsFavoriteAttribute()
{
    return $this->favorites()->where('user_id', Auth::id())->exists();
}


}
