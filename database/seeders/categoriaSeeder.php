<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'nome' => 'Desenvolvimento'            
        ]);
        DB::table('categorias')->insert([
            'nome' => 'Insumos'            
        ]);
        DB::table('categorias')->insert([
            'nome' => 'Periféricos'            
        ]);
    }
}
