<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistTrackTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artist_track_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('artist_track_id');
            $table->foreign('artist_track_id')->references('id')->on('artist_tracks');
            $table->unsignedBigInteger('curator_feature_tag_id');
            $table->foreign('curator_feature_tag_id')->references('id')->on('curator_feature_tags');
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
        Schema::dropIfExists('artist_track_tags');
    }
}
