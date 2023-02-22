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
    Schema::create('produtos', function (Blueprint $table) {
      $table->id('id_produto');
      $table->string('nome');

      $table->unsignedBigInteger('id_categoria');
      $table->foreign('id_categoria')->references('id_categoria')->on('categorias')->onDelete('cascade')->onUpdate('cascade');

      $table->unsignedBigInteger('id_fornecedor');
      $table->foreign('id_fornecedor')->references('id_fornecedor')->on('fornecedores')->onDelete('cascade')->onUpdate('cascade');
      
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
    Schema::dropIfExists('produtos');
  }
};
