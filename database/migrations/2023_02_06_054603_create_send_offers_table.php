<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSendOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('send_offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curator_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('offer_template_id')->constrained('curator_offer_templates')->cascadeOnDelete();
            $table->foreignId('artist_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('track_id')->constrained('artist_tracks')->cascadeOnDelete();
            $table->foreignId('campaign_id')->constrained('campaigns')->cascadeOnDelete();
            $table->date('expiry_date')->nullable();
            $table->date('publish_date')->nullable();
            $table->enum('status',['PENDING','ACCEPTED','REJECTED','EXPIRED','ALTERNATIVE','COMPLETED','NEW'])->default('PENDING');
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
        Schema::dropIfExists('send_offers');
    }
}
