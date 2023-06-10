<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        DB::unprepared('
            CREATE TRIGGER TR_SAI_ESTOQUE AFTER INSERT
            ON saidas FOR EACH ROW
            BEGIN
                DECLARE quantidade_atual INT;
                DECLARE setor INT;
                
                SELECT id_setor INTO setor
                FROM users 
                WHERE id_user = NEW.id_user;
                
                SELECT quantidade INTO quantidade_atual
                FROM estoque
                WHERE id_produto = NEW.id_produto AND id_setor = setor;
                
                IF quantidade_atual > 0 THEN
                    UPDATE estoque SET quantidade = quantidade - NEW.quantidade
                    WHERE id_produto = NEW.id_produto;
                END IF;
            END
        ');
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS TR_SAI_ESTOQUE');
    }
};
