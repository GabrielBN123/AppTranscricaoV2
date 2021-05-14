<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormulariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formularios', function (Blueprint $table) {
            $table->id();
            $table->string('apresentacao')->nullable();
            $table->string('aviso')->nullable();
            $table->string('pedidoOracao')->nullable();
            $table->string('Felicitacao')->nullable();
            $table->string('pedidoLouvor')->nullable();
            $table->string('acaoGracas')->nullable();
            $table->string('apresentacaoRN')->nullable();
            $table->string('pedidoComunhao')->nullable();
            $table->string('cartaApresentacao')->nullable();
            $table->foreign('userID')->references('id')->on('users');
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
        Schema::dropIfExists('formularios');
    }
}
