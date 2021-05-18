<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApresentacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apresentacoes', function (Blueprint $table) {
            $table->id();
            $table->text('texto')->nullable();
            $table->boolean('confirmado')->nullable();
            $table->foreign('instituicao_id')->references('id')->on('instituicoes');
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
        Schema::dropIfExists('apresentacaos');
    }
}
