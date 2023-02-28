<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class fornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fornecedores')->insert([
            'nome'=>'Carlos Souza',
            'email'=>'carlosp.souza@gmail.com',
            'telefone'=>'+55(21)979384174',
            'cnpj'=>'12.194.359/0001-26',
            'observacoes' => ''
        ]);
        DB::table('fornecedores')->insert([
            'nome'=>'Intelbras',
            'email'=>'intelbras@intelbras.com',
            'telefone'=>'+55(41)5555555555',
            'cnpj'=>'82.901.000/0001-27',
            'observacoes' => ''
        ]);
    }
}
