<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class estoqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estoque')->insert([
            'quantidade'  => 1,
            'minimo'      => 0,
            'id_produto'  => 1,
            'observacoes' => '',
            'id_setor'    => 1
        ]);
        DB::table('estoque')->insert([
            'quantidade'  => 10,
            'minimo'      => 5,
            'id_produto'  => 2,
            'observacoes' => '',
            'id_setor'    => 2
        ]);
    }
}
