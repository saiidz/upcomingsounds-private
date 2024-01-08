<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnStatusVerifiedContentCreatorCuratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('verified_content_creator_curators', function (Blueprint $table) {
            $table->after('pay_now', function ($table) {
                $table->enum('status',['PENDING','ACCEPTED','REJECTED','COMPLETED'])->default('PENDING');
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
