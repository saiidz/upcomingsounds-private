<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnTicketNoStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ticket_helps', function (Blueprint $table) {
            $table->after('phone_number', function($table){
                $table->longText('ticket_no')->nullable();
                $table->integer('status')->default(0);
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
        Schema::table('ticket_helps', function (Blueprint $table) {
            //
        });
    }
}
