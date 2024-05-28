<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration {
    public function up() {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('title',255);
            $table->string('artist',255);
            $table->string('album',25);
            $table->string('genre',255);
            $table->integer('duration');
            $table->string('file_path');
            $table->string('cover_image')->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('songs');
    }
}
