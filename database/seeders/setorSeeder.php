<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class setorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setores')->insert([
            'nome'=>'TI'
        ]);
        DB::table('setores')->insert([
            'nome'=>'Manutenção'
        ]);
    }
}
