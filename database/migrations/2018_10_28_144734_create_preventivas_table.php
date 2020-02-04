<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreventivasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preventivas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cliente');
            $table->string('instancia');
            $table->string('cluster');
            $table->string('cidade');
            $table->text('reclamacao');
            $table->string('status');
            $table->string('resolucao');
            $table->string('tipificacao');
            $table->string('encerramento')->nullable();
            $table->unsignedBigInteger('user_id')->unsigned;
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('criado_por');
            $table->string('tecnologia')->nullable();


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
        Schema::dropIfExists('preventivas');
    }
}
