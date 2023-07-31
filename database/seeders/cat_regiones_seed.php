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
        $table = 'cat_regiones';
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table($table)->truncate();
        DB::statement("ALTER TABLE ".$table." AUTO_INCREMENT = 1");

        DB::table($table)->insert(['nombre' => 'Centro']);
        DB::table($table)->insert(['nombre' => 'Noreste']);
        DB::table($table)->insert(['nombre' => 'Noroeste']);
        DB::table($table)->insert(['nombre' => 'Norte']);
        DB::table($table)->insert(['nombre' => 'Occidente']);
        DB::table($table)->insert(['nombre' => 'Sureste']);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); 
    }

}
