<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuratorUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curator_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('curator_signup_from')->nullable();
            $table->string('tastemaker_name')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();;
            $table->foreign('country_id')->references('id')->on('countries');
            $table->string('instagram_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('spotify_url')->nullable();
            $table->string('soundcloud_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('website_url')->nullable();
            $table->boolean('is_approved')->default(false);
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
        Schema::dropIfExists('curator_users');
    }
}
