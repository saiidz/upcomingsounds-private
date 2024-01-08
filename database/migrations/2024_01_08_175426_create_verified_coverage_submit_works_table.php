<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifiedCoverageSubmitWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verified_coverage_submit_works', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curator_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('verified_content_creator_id')->constrained('verified_content_creator_curators')
                ->cascadeOnDelete()->name('fk_vcs_works_verified_content_creator');
            $table->enum('status',['APPROVED','PENDING','REJECTED'])->default('PENDING');
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
        Schema::dropIfExists('verified_coverage_submit_works');
    }
}
