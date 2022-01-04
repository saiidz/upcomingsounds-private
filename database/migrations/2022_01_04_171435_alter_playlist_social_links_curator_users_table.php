<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPlaylistSocialLinksCuratorUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('curator_users', function (Blueprint $table) {
            $table->after('come_upcoming', function ($table) {
                $table->string('playlist_spotify_url')->nullable();
                $table->string('playlist_deezer_url')->nullable();
                $table->string('playlist_apple_url')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
