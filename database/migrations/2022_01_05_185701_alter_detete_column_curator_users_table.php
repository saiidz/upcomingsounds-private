<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDeteteColumnCuratorUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('curator_users', function (Blueprint $table) {
            $table->dropColumn('playlist_spotify_url');
            $table->dropColumn('playlist_deezer_url');
            $table->dropColumn('playlist_apple_url');
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
