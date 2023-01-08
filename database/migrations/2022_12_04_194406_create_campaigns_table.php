<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('track_id')->nullable()->constrained('artist_tracks')->onDelete('cascade');
            $table->string('package_name')->nullable();
            $table->string('usc_credit')->nullable();
            $table->string('pay_now')->nullable();
            $table->string('establish_receive_media')->nullable();
            $table->boolean('status')->default(false);
            $table->integer('add_days')->nullable();
            $table->boolean('add_remove_banner')->default(false);
            $table->string('track_name')->nullable();
            $table->longText('track_description')->nullable();
            $table->longText('artist_name')->nullable();
            $table->longText('track_thumbnail')->nullable();
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
        Schema::dropIfExists('campaigns');
    }
}
