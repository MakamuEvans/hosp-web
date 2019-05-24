<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('check_in_id')->unsigned();
            $table->bigInteger('drug_id')->unsigned();
            $table->bigInteger('chemist_id')->unsigned();
            $table->string('remarks', 191)->nullable();
            $table->softDeletes();
            $table->timestamps();

            //relations
            $table->foreign('check_in_id')->references('id')->on('check_ins');
            $table->foreign('drug_id')->references('id')->on('drugs');
            $table->foreign('chemist_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medications');
    }
}
