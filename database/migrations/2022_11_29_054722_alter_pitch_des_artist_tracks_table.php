<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPitchDesArtistTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('artist_tracks', function (Blueprint $table) {
            $table->after('description', function($table){
                $table->longText('pitch_description')->nullable();
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
        Schema::table('artist_tracks', function (Blueprint $table) {
            $table->after('description', function($table){
                $table->longText('pitch_description')->nullable();
            });
        });
    }
}
