<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifiedContentCreatorCuratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verified_content_creator_curators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artist_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('artist_track_id')->constrained('artist_tracks')->onDelete('cascade');
            $table->foreignId('curator_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('verified_coverage_id')->constrained('verified_coverages')->onDelete('cascade');
            $table->string('usc_credit')->nullable();
            $table->string('pay_now')->nullable();
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
        Schema::dropIfExists('verified_content_creator_curators');
    }
}
