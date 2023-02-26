<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class movimentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movimentos')->insert([
            'tipo'=>0,
            'nota_fiscal'=>'NF0001',
            'numeroSerie'=>'KJHG15245SD',
            'valor'=>1000.00,
            'garantia'=>365,
            'id_produto'=>1,
            'id_user'=>1,
            'observacoes' => ''
        ]);
    }
}
