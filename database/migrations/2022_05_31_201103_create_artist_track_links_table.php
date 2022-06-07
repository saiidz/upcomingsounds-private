<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistTrackLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artist_track_links', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('artist_track_id');
            $table->foreign('artist_track_id')->references('id')->on('artist_tracks');
            $table->longText('link')->nullable();
            $table->string('icon')->nullable();
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
        Schema::dropIfExists('artist_track_links');
    }
}
