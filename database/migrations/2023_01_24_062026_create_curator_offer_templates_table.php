<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuratorOfferTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curator_offer_templates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->enum('type', ['OFFER','DIRECT_OFFER'])->default('OFFER');
            $table->string('title')->nullable();
            $table->foreignId('offer_type')->constrained('offer_types')->cascadeOnDelete();
            $table->longText('offer_text')->nullable();
            $table->integer('contribution')->nullable();
            $table->foreignId('alternative_option')->constrained('alternative_options')->cascadeOnDelete();
            $table->boolean('is_active')->default(false);
            $table->boolean('is_approved')->default(false);
            $table->boolean('is_rejected')->default(false);
            $table->boolean('confirm')->default(false);
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
        Schema::dropIfExists('curator_offer_templates');
    }
}
