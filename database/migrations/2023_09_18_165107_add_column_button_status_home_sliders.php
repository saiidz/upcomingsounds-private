<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnButtonStatusHomeSliders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('home_sliders', function (Blueprint $table) {
            $table->after('button_one_link', function ($table) {
                $table->boolean('button_one_status')->default(false);
            });
            $table->after('button_two_link', function ($table) {
                $table->boolean('button_two_status')->default(false);
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
        Schema::table('home_sliders', function (Blueprint $table) {
            //
        });
    }
}
