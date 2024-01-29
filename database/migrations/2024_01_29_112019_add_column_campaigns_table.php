<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaigns', function (Blueprint $table) {
            $table->after('banner_img_status', function($table){
                $table->longText('banner_img_one')->nullable();
                $table->boolean('banner_img_one_status')->default(false);
                $table->string('button_text')->nullable();
                $table->longText('button_link')->nullable();
                $table->boolean('button_status')->default(false);
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
        Schema::table('campaigns', function (Blueprint $table) {
            //
        });
    }
}
