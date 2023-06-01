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
            CREATE TRIGGER TR_ENT_ESTOQUE AFTER INSERT
            ON entradas FOR EACH ROW
            BEGIN
                DECLARE quantidade_atual INT;
                DECLARE setor INT;
    
                SELECT id_setor INTO setor
                FROM users 
                WHERE id_user = NEW.id_user;
    
                SELECT quantidade INTO quantidade_atual
                FROM estoque
                WHERE id_produto = NEW.id_produto;
    
                IF quantidade_atual IS NULL THEN
                    INSERT INTO estoque (id_produto, quantidade, id_setor) VALUES (NEW.id_produto, NEW.quantidade, setor);
                ELSE
                    UPDATE estoque SET quantidade = quantidade + NEW.quantidade
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
        DB::unprepared('DROP TRIGGER IF EXISTS TR_ENT_ESTOQUE');
    }
};
