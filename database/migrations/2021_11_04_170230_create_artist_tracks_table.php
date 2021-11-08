<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artist_tracks', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('track_category_id');
            $table->foreign('track_category_id')->references('id')->on('track_categories');
            $table->longText('youtube_soundcloud_url')->nullable();
            $table->string('spotify_track_url')->nullable();
            $table->date('release_date')->nullable();
            $table->boolean('display_profile')->default(false);
            $table->boolean('favorite')->default(false);
            $table->boolean('add_queque')->default(false);
            $table->boolean('add_playlist')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artist_tracks');
    }
}
