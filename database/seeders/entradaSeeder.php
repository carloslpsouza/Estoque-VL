<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class entradaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('entradas')->insert([
            'nota_fiscal'  => 'NF001',
            'valor'        => 1000.00,
            'garantia'     => 365,
            'id_movimento' => 1
        ]);       
    }
}
