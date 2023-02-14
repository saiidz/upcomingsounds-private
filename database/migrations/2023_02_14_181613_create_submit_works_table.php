<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmitWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submit_works', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curator_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('send_offer_id')->constrained('send_offers')->cascadeOnDelete();
            $table->enum('status',['APPROVED','PENDING','REJECTED'])->default('PENDING');
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
        Schema::dropIfExists('submit_works');
    }
}
