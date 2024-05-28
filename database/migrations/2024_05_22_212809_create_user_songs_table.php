<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSongsTable extends Migration {
    public function up() {
        Schema::create('user_songs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('song_id')->constrained('songs');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('user_songs');
    }
}
