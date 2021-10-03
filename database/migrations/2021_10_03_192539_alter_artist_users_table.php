<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterArtistUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('artist_users', function (Blueprint $table) {
            $table->after('come_upcoming', function ($table) {
                $table->string('artist_representative_record')->nullable();
                $table->string('artist_representative_manager')->nullable();
                $table->string('artist_representative_press')->nullable();
                $table->string('artist_representative_publisher')->nullable();
                $table->unsignedBigInteger('artist_country_id')->nullable();;
                $table->foreign('artist_country_id')->references('id')->on('countries');
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
