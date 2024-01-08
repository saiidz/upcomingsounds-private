<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifiedCoverageSubmitWorkLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verified_coverage_submit_work_links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('verified_coverage_submit_work_id')->constrained('verified_coverage_submit_works')
                ->cascadeOnDelete()->name('fk_vcswl_vcsw');;
            $table->longText('link')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('verified_coverage_submit_work_links');
    }
}
