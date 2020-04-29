<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialtyJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_specialty', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_id')->index()->unsigned()->nulltabel();
            $table->integer('specialty_id')->index()->unsigned()->nulltabel();
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
        Schema::drop('job_specialty');
    }
}
