<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnApplyCountCuratorVerificationFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('curator_verification_forms', function (Blueprint $table) {
            $table->after('embedded_player', function($table){
                $table->integer('apply_count')->default(0);
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
        Schema::table('curator_verification_forms', function (Blueprint $table) {
            //
        });
    }
}
