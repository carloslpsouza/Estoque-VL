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
            'quantidade'  => 1,
            'numeroSerie' => 'KJHG15245SD',
            'observacoes' => '',
            'id_produto'  => 1,
            'id_user'     => 1
        ]);
    }
}
