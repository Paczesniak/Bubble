<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCoverImageToSongsTable extends Migration
{
    public function up()
    {
        Schema::table('songs', function (Blueprint $table) {
            $table->string('cover_image')->nullable()->after('file_path');
        });
    }

    public function down()
    {
        Schema::table('songs', function (Blueprint $table) {
            $table->dropColumn('cover_image');
        });
    }
}
