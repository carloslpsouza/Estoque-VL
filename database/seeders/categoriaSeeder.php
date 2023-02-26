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
            'nome' => 'Desenvolvimento',
            'observacoes' => ''          
        ]);
        DB::table('categorias')->insert([
            'nome' => 'Insumos de rede',
            'observacoes' => ''            
        ]);
        DB::table('categorias')->insert([
            'nome' => 'Insumos de hardware',
            'observacoes' => ''            
        ]);
        DB::table('categorias')->insert([
            'nome' => 'Periféricos',
            'observacoes' => ''            
        ]);
    }
}
