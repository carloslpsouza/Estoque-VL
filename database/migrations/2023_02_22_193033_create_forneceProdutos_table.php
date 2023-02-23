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
        Schema::create('forneceProdutos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_fornecedor');
            $table->foreign('id_fornecedor')->references('id_fornecedor')->on('fornecedores')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('id_produto');
            $table->foreign('id_produto')->references('id_produto')->on('produtos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forneceProdutos');
    }
};
