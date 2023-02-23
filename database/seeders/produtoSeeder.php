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
            'nome'=>'Produto 01',
            'id_categoria'=>1
        ]);
        DB::table('produtos')->insert([
            'nome'=>'Produto 02',
            'id_categoria'=>2
        ]);
        DB::table('produtos')->insert([
            'nome'=>'Produto 03',
            'id_categoria'=>3
        ]);
    }
}
