<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifiedCoverageSubmitWorkImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verified_coverage_submit_work_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('verified_coverage_submit_work_id')->constrained('verified_coverage_submit_works')
                ->cascadeOnDelete()->name('fk_vcswi_vcsw');
            $table->string('path')->nullable();
            $table->string('type')->nullable();
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
        Schema::dropIfExists('verified_coverage_submit_work_images');
    }
}
