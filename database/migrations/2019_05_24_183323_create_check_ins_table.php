<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckInsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_ins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_id');
            $table->bigInteger('receptionist_id')->unsigned();
            $table->string('weight', 20)->nullable();
            $table->string('temperature', 20)->nullable();
            $table->string('remarks', 191)->nullable();
            $table->boolean('progress')->default(false); //
            $table->softDeletes();
            $table->timestamps();

            //relations
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('receptionist_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('check_ins');
    }
}
