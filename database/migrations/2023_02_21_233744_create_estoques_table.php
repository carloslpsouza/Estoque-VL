<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estoque', function (Blueprint $table) {
            $table->id('id_estoque');
            $table->float('quantidade');
            $table->text('observacoes')->nullable();

            $table->unsignedBigInteger('id_produto');
            $table->foreign('id_produto')->references('id_produto')->on('produtos')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('id_setor');
            $table->foreign('id_setor')->references('id_setor')->on('setores')->onDelete('cascade')->onUpdate('cascade');
            
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
        Schema::dropIfExists('estoque');
    }
};
