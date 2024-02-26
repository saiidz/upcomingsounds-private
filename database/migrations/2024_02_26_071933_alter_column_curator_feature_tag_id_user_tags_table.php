<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnCuratorFeatureTagIdUserTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_tags', function (Blueprint $table) {
            // Modify the column to be nullable
            $table->unsignedBigInteger('feature_tag_id')->nullable()->change();
            // Add new foreign key constraint
            $table->foreign('feature_tag_id')->references('id')->on('feature_tags')->onDelete('SET NULL');

            $table->after('user_id', function($table){
                $table->foreignId('curator_feature_tag_id')->nullable()->references('id')->on('curator_feature_tags');
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
        Schema::table('user_tags', function (Blueprint $table) {
            //
        });
    }
}
