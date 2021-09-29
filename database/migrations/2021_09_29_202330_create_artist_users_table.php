<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artist_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('artist_name')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();;
            $table->foreign('country_id')->references('id')->on('countries');
            $table->string('instagram_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('spotify_url')->nullable();
            $table->string('soundcloud_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('released')->nullable();
            $table->string('released_day')->nullable();
            $table->string('come_upcoming')->nullable();
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
        Schema::dropIfExists('artist_users');
    }
}
