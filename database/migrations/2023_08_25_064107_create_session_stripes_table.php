<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionStripesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_stripes', function (Blueprint $table) {
            $table->id();
            $table->longText('session_id')->nullable();
            $table->string('coupon_code')->unique()->index()->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('currency')->nullable();
            $table->string('live_mode')->nullable();
            $table->longText('url')->nullable();
            $table->string('payment_status')->nullable();
            $table->enum('claim_now_status',['PENDING','PAID'])->default('PENDING');
            $table->json('details')->nullable();
            $table->longText('stripe_customer_id')->nullable();
            $table->json('customer_details')->nullable();
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
        Schema::dropIfExists('session_stripes');
    }
}
