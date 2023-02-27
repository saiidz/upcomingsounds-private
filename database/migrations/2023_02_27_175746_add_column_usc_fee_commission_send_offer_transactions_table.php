<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnUscFeeCommissionSendOfferTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('send_offer_transactions', function (Blueprint $table) {
            $table->after('contribution', function ($table){
                $table->integer('usc_fee_commission')->nullable();
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
        Schema::table('send_offer_transactions', function (Blueprint $table) {
            //
        });
    }
}
