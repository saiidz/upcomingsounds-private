<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistCouponGiftCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artist_coupon_gift_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->foreignId('session_strip_id')->references('id')->on('session_stripes')->constrained()->onDelete('cascade');
            $table->string('credits')->nullable();
            $table->string('coupon_code')->unique()->index()->nullable();
            $table->enum('status',['PENDING','PAID','CANCELLED'])->default('PENDING');
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
        Schema::dropIfExists('artist_coupon_gift_cards');
    }
}
