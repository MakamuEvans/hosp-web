<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRadiologyDiagnosesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radiology_diagnoses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('check_in_id')->unsigned();
            $table->bigInteger('test_id')->unsigned();
            $table->bigInteger('technician_id')->unsigned()->nullable();
            $table->string('remarks', 191)->nullable();
            $table->softDeletes();
            $table->timestamps();

            //relations
            $table->foreign('check_in_id')->references('id')->on('check_ins');
            $table->foreign('test_id')->references('id')->on('radiology_tests');
            $table->foreign('technician_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('radiology_diagnoses');
    }
}
