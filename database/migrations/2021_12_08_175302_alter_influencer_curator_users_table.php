<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterInfluencerCuratorUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('curator_users', function (Blueprint $table) {
            $table->dropColumn(['is_approved']);
        });

        Schema::table('curator_users', function (Blueprint $table) {
            $table->after('country_id', function ($table) {
                $table->string('share_music')->nullable();
            });
        });

        Schema::table('curator_users', function (Blueprint $table) {
            $table->after('instagram_url', function ($table) {
                $table->string('tiktok_url')->nullable();
            });

        });

        Schema::table('curator_users', function (Blueprint $table) {
            $table->after('website_url', function ($table) {
                $table->string('come_upcoming')->nullable();
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
        //
    }
}
