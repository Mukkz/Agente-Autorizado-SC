<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cliente');
            $table->string('documento');
            $table->string('informacao');
            $table->string('cluster');
            $table->string('status');
            $table->string('feedback')->nullable();
            $table->string('criado_por');
            $table->timestamps();
            $table->unsignedBigInteger('user_id')->unsigned;
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bas');
    }
}
