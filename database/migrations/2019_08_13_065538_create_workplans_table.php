<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkplansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workplans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("subcounty_id");
            $table->string("period_month");
            $table->integer("period_year");
            $table->integer("mentor_id");
            $table->integer("mentor_venue");
            $table->integer("mentor_work_station");
            $table->integer("created_by")->default(0);
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
        Schema::dropIfExists('workplans');
    }
}
