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
            'e-mail'=>'carlosp.souza@gmail.com',
            'telefone'=>'+55(21)979384174'
        ]);
    }
}
