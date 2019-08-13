<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameSiteColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('expected_outcomes', function (Blueprint $table) {
            $table->renameColumn('site_id', 'topics_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('expected_outcomes', function (Blueprint $table) {
            $table->renameColumn('topics_id', 'site_id');
        });
    }
}
