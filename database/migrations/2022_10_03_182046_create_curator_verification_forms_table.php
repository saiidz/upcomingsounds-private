<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuratorVerificationFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curator_verification_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();;
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('curator_type')->nullable();
            $table->string('sub_curator_type')->nullable();
            $table->string('name')->nullable();
            $table->longText('image')->nullable();
            $table->longText('information')->nullable();
            $table->longText('descriptions')->nullable();
            $table->longText('embedded_player')->nullable();
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
        Schema::dropIfExists('curator_verification_forms');
    }
}
