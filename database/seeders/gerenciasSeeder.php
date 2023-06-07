<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class gerenciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gerencias')->insert([
            'id_setor'=>1,
            'id_user' =>1
        ]);
        DB::table('gerencias')->insert([
            'id_setor'=>2,
            'id_user' =>1
        ]);
    }
}
