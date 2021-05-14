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
            $table->text('apresentacao')->nullable();
            $table->text('aviso')->nullable();
            $table->text('pedidoOracao')->nullable();
            $table->text('Felicitacao')->nullable();
            $table->text('pedidoLouvor')->nullable();
            $table->text('acaoGracas')->nullable();
            $table->text('apresentacaoRN')->nullable();
            $table->text('pedidoComunhao')->nullable();
            $table->text('cartaApresentacao')->nullable();
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
