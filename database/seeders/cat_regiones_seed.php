<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cat_regiones_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); 
        DB::table('cat_regiones')->insert(['nombre' => 'Centro']);
        DB::table('cat_regiones')->insert(['nombre' => 'Noreste']);
        DB::table('cat_regiones')->insert(['nombre' => 'Noroeste']);
        DB::table('cat_regiones')->insert(['nombre' => 'Norte']);
        DB::table('cat_regiones')->insert(['nombre' => 'Occidente']);
        DB::table('cat_regiones')->insert(['nombre' => 'Sureste']);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); 
    }

}
