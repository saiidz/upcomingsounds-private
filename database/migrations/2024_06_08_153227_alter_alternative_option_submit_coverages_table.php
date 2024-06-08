<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAlternativeOptionSubmitCoveragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('submit_coverages', function (Blueprint $table) {
            //
            // Drop the foreign key constraint
//            $table->dropForeign(['offer_type_id']);

            // Make the column nullable
            $table->foreignId('offer_type_id')->nullable()->change();

            // Add the foreign key constraint back
//            $table->foreign('offer_type_id')->references('id')->on('offer_types')->cascadeOnDelete();

            $table->foreignId('alternative_option_id')->nullable()->after('offer_type_id')->constrained('alternative_options')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('submit_coverages', function (Blueprint $table) {
            //
        });
    }
}
