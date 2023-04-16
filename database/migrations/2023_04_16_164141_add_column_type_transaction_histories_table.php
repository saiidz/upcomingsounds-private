<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnTypeTransactionHistoriesTable extends Migration
{
    const DEPOSIT = 'DEPOSIT';
    const WITHDRAWAL = 'WITHDRAWAL';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaction_histories', function (Blueprint $table) {
            $table->after('user_type', function($table){
                $table->enum('type', [self::DEPOSIT, self::WITHDRAWAL])->default(self::DEPOSIT);
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
        Schema::table('transaction_histories', function (Blueprint $table) {
            //
        });
    }
}
