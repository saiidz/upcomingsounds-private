<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTransactionHistoriesCreditTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaction_histories', function (Blueprint $table) {
            $table->dropColumn('contacts');
        });

        Schema::table('transaction_histories', function (Blueprint $table) {
            $table->after('amount', function ($table) {
                $table->integer('credits')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
