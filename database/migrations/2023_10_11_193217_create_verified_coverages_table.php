<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifiedCoveragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verified_coverages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('offer_type')->constrained('offer_types')->cascadeOnDelete();
            $table->longText('time_to_publish')->nullable();
            $table->integer('contribution')->nullable();
            $table->boolean('is_active')->default(false);
            $table->boolean('is_approved')->default(false);
            $table->boolean('is_rejected')->default(false);
            $table->boolean('confirm')->default(false);
            $table->longText('reason_reject')->nullable();
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
        Schema::dropIfExists('verified_coverages');
    }
}
