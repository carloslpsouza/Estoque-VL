<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class forneceProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('forneceProdutos')->insert([
            'id_produto'=>1,
            'id_fornecedor'=>1
        ]);
        DB::table('forneceProdutos')->insert([
            'id_produto'=>1,
            'id_fornecedor'=>2
        ]);
        DB::table('forneceProdutos')->insert([
            'id_produto'=>3,
            'id_fornecedor'=>1
        ]);
    }
}
