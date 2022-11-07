<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnIsApprovedArtistTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('artist_tracks', function (Blueprint $table) {
            $table->after('user_id', function($table){
                $table->integer('is_approved')->default(0);
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
            $table->after('user_id', function($table){
                $table->integer('is_approved')->default(0);
            });
        });
    }
}
