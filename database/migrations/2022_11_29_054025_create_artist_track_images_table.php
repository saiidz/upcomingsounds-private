<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistTrackImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artist_track_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artist_track_id')->constrained('artist_tracks')->onDelete('cascade');
            $table->longText('path')->nullable();
            $table->string('type')->nullable();
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
        Schema::dropIfExists('artist_track_images');
    }
}
