<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnUscFeeCommissionVerifiedContentCreatorCuratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('verified_content_creator_curators', function (Blueprint $table) {
            $table->after('usc_credit', function ($table) {
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
        Schema::table('verified_content_creator_curators', function (Blueprint $table) {
            //
        });
    }
}
