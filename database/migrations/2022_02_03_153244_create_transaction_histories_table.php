<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('user_type')->nullable();
            $table->string('package_name')->nullable();
            $table->integer('amount')->nullable();
            $table->integer('contacts')->nullable();
            $table->enum('payment_status', ['completed'])->default('completed');
            $table->string('payment_method')->nullable();
            $table->longText('payment_response')->nullable();
            $table->dateTime('paid_at')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('customer_id')->nullable();
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
        Schema::dropIfExists('transaction_histories');
    }
}
