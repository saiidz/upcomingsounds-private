<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmitCoveragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submit_coverages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curator_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('artist_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('track_id')->constrained('artist_tracks')->cascadeOnDelete();
            $table->foreignId('campaign_id')->constrained('campaigns')->cascadeOnDelete();
            $table->foreignId('offer_type_id')->constrained('offer_types')->cascadeOnDelete();
            $table->json('links')->nullable();
            $table->longText('message')->nullable();
            $table->string('tiers')->nullable();
            $table->date('submit_at')->nullable();
            $table->enum('status',['PENDING','COMPLETED'])->default('PENDING');
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
        Schema::dropIfExists('submit_coverages');
    }
}
