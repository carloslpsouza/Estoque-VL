<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class produtoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert([
            'nome'=>'Conector macho RJ45 CAT 5e',
            'id_categoria'=>1,
            'observacoes' => ''
        ]);
        DB::table('produtos')->insert([
            'nome'=>'Placa de rede',
            'id_categoria'=>2,
            'observacoes' => ''
        ]);
        DB::table('produtos')->insert([
            'nome'=>'HD 4 TB',
            'id_categoria'=>3,
            'observacoes' => ''
        ]);
    }
}
