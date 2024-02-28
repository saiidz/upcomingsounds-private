<?php

use App\Templates\IOfferTemplateStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnCuratorVerificationFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('curator_verification_forms', function (Blueprint $table) {
            $table->after('apply_count', function($table){
                $table->longText('message')->nullable();
                $table->boolean('is_block')->default(0);
                $table->enum('status',[IOfferTemplateStatus::ACCEPTED,IOfferTemplateStatus::PENDING,IOfferTemplateStatus::REJECTED])->default(IOfferTemplateStatus::PENDING);
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
