<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('artist_completed_signup')->nullable();
            $table->string('password')->nullable();
            $table->string('phone_number')->nullable();
            $table->dateTime('is_verified_at')->nullable();
            $table->string('address')->nullable();
            $table->longText('profile')->nullable();
            $table->enum('type', ['admin', 'curator', 'artist'])->default('artist');
            $table->enum('status', ['active', 'suspend','block'])->default('active');
            $table->date('suspended_at')->nullable();
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('access_token')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
