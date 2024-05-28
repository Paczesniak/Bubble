<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaylistsTable extends Migration {
    public function up() {
        Schema::create('playlists', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->foreignId('user_id')->constrained('users');
            $table->text('description',255)->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('playlists');
    }
}
