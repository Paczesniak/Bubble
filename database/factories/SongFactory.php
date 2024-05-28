<?php
use Faker\Generator as Faker;
use App\Models\Song;

$factory->define(Song::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'artist' => $faker->name,
        'album' => $faker->sentence,
        'genre' => $faker->word,
        'duration' => $faker->numberBetween(100, 300),
        'file_path' => 'music_files/' . $faker->uuid . '.mp3',
        'cover_image' => 'cover_images/' . $faker->uuid . '.jpg',
    ];
});
