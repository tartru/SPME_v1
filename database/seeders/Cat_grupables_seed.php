<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cat_grupables_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'cat_grupables';
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table($table)->truncate();
        DB::statement("ALTER TABLE ".$table." AUTO_INCREMENT = 1");
        
        //grupo_captura_sp_user` 
            DB::table($table)->insert(['cat_grupos_captura_id' => 1, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 2, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 3, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 4, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 5, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 6, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 7, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 8, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 9, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 10, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 11, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 12, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 13, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 14, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 15, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 16, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 17, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 18, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 19, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 20, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 21, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 22, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 23, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 24, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 25, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 26, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 27, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 28, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 29, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 30, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 31, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 32, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 33, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 34, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 35, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 36, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 37, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 38, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 39, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 40, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 41, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 42, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 43, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 44, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 45, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 46, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 47, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 48, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 49, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 50, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 51, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 52, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 54, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 55, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 56, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 57, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 58, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 59, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 60, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 61, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 62, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 63, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 64, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 65, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 66, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 67, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 68, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 69, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 70, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 71, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 72, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 73, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 74, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 75, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 76, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 77, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 78, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 79, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 80, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 81, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 82, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 83, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 84, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 85, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 86, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 87, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 88, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 89, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 90, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 91, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 92, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 93, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 94, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 95, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 96, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 97, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 98, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 99, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 100, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 101, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 102, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 103, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 104, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 105, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 106, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 107, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 1, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 2, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 3, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 4, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 5, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 6, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 7, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 8, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 9, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 10, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 11, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 12, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 13, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 14, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 15, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 16, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 17, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 18, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 19, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 20, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 21, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 22, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 23, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 24, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 25, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 26, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 27, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 28, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 29, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 30, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 31, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 32, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 33, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 34, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 35, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 36, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 37, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 38, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 41, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 43, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 46, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 47, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 49, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 51, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 54, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 55, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 56, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 57, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 58, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 60, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 61, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 62, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 63, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 64, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 68, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 69, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 70, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 73, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 74, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 75, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 76, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 77, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 78, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 79, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 80, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 81, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 82, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 83, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 84, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 85, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 86, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 87, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 88, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 89, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 90, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 91, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 92, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 93, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 94, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 95, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 96, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 97, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 98, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 99, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 100, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 101, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 102, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 103, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 104, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 105, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 1, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 2, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 3, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 4, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 5, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 6, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 7, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 8, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 9, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 10, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 11, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 12, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 13, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 14, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 15, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 16, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 17, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 18, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 19, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 20, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 21, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 22, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 23, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 24, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 25, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 26, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 27, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 28, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 29, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 30, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 31, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 32, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 33, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 34, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 35, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 36, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 37, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 38, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 41, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 43, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 46, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 47, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 49, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 51, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 54, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 55, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 56, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 57, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 58, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 60, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 61, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 62, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 63, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 64, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 68, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 69, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 70, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 73, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 74, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 75, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 76, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 77, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 78, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 79, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 80, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 81, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 82, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 83, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 84, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 85, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 86, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 87, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 88, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 89, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 90, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 91, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 92, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 93, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 94, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 95, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 96, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 97, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 98, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 99, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 100, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 101, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 102, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 103, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 104, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 105, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 1, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 2, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 3, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 4, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 5, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 6, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 7, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 8, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 9, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 10, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 11, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 12, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 13, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 14, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 15, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 16, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 17, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 18, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 19, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 20, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 21, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 22, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 23, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 24, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 25, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 26, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 27, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 28, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 29, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 30, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 31, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 32, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 33, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 34, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 35, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 36, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 37, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 38, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 41, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 43, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 46, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 47, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 49, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 51, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 54, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 55, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 56, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 57, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 58, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 60, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 61, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 62, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 63, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 64, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 68, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 69, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 70, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 73, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 74, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 75, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 76, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 77, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 78, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 79, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 80, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 81, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 82, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 83, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 84, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 85, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 86, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 87, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 88, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 89, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 90, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 91, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 92, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 93, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 94, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 95, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 96, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 97, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 98, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 99, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 100, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 101, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 102, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 103, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 104, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 105, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 5, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 6, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 1, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 2, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 3, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 4, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 5, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 6, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 7, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 8, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 9, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 10, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 11, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 12, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 13, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 14, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 15, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 16, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 17, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 18, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 19, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 20, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 21, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 22, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 23, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 24, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 25, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 26, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 27, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 28, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 29, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 30, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 31, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 32, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 33, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 34, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 35, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 36, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 37, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 38, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 41, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 43, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 46, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 47, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 49, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 51, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 54, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 55, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 56, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 57, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 58, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 60, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 61, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 62, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 63, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 64, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 68, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 69, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 70, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 73, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 74, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 75, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 76, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 77, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 78, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 79, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 80, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 81, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 82, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 83, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 84, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 85, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 86, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 87, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 88, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 89, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 90, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 91, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 92, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 93, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 94, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 95, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 96, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 97, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 98, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 99, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 100, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 101, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 102, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 103, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 104, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 105, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 8, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 9, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 10, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 11, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 12, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 14, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 15, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 17, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 18, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 20, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 21, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 22, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 23, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 24, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 25, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 26, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 27, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 28, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 29, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 30, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 31, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 32, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 33, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 34, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 35, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 36, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 37, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 38, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 39, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 40, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 41, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 42, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 43, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 44, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 45, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 46, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 47, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 48, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 49, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 50, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 51, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 54, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 55, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 57, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 58, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 59, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 1, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 2, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 3, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 4, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 5, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 6, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 7, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 8, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 9, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 10, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 11, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 12, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 13, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 14, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 15, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 16, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 17, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 18, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 19, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 20, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 21, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 22, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 23, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 24, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 25, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 26, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 27, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 28, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 29, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 30, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 31, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 32, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 33, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 34, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 35, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 36, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 37, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 38, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 39, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 40, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 41, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 42, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 43, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 44, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 45, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 46, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 47, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 48, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 49, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 50, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 51, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 52, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 54, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 55, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 56, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 57, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 58, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 59, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 60, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 61, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 62, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 63, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 64, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 65, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 66, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 67, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 68, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 69, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 70, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 71, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 72, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 73, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 74, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 75, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 76, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 77, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 78, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 79, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 80, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 81, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 82, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 83, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 84, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 85, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 86, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 87, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 88, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 89, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 90, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 91, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 92, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 93, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 94, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 95, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 96, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 97, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 98, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 99, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 100, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 101, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 102, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 103, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 104, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 105, 'cat_grupable_id' => 60, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 61, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 62, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 63, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 64, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 65, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 66, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 67, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 68, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 69, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 70, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 71, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 72, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 73, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 74, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 75, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 76, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 77, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 78, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 79, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 80, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 81, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 82, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 83, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 84, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 85, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 86, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 87, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 88, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 89, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 90, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 91, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 92, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 93, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 94, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 95, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 96, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 97, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 98, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 99, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 100, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 101, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 102, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 103, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 104, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 105, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 106, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 107, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 108, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 109, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 110, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 111, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 112, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 113, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 114, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 115, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 116, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 117, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 118, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 119, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 120, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 121, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 122, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 123, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 124, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 125, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 126, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 127, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 128, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 129, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 130, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 131, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 132, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 133, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 134, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 135, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 136, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 137, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 138, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 139, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 140, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 141, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 142, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 143, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 144, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 145, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 146, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 147, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 148, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 149, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 150, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 151, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 152, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 153, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 154, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 155, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 156, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 157, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 158, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 159, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 160, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 161, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 162, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 163, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 164, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 165, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 166, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 167, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 168, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 169, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 170, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 171, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 172, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 173, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 174, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 175, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 176, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 177, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 178, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 179, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 180, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 1, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 2, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 3, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 4, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 5, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 6, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 7, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 8, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 9, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 10, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 11, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 12, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 13, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 14, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 15, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 16, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 17, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 18, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 19, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 20, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 21, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 22, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 23, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 24, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 25, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 26, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 27, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 28, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 29, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 30, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 31, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 32, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 33, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 34, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 35, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 36, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 37, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 38, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 39, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 40, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 41, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 42, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 43, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 44, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 45, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 46, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 47, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 48, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 49, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 50, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 51, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 52, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 54, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 55, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 56, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 57, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 58, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 59, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 60, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 61, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 62, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 63, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 64, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 65, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 66, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 67, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 68, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 69, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 70, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 71, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 72, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 73, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 74, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 75, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 76, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 77, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 78, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 79, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 80, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 81, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 82, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 83, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 84, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 85, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 86, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 87, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 88, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 89, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 90, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 91, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 92, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 93, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 94, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 95, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 96, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 97, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 98, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 99, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 100, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 101, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 102, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 103, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 104, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 105, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 106, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 107, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 109, 'cat_grupable_id' => 181, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 182, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 183, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 184, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 185, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 186, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => 187, 'cat_grupable_type' => 'App\Models\User','created_at' => now()]);
        //grupo_captura_sp_user`
        //`grupo_captura` en la columna de entidades federativas
            DB::table($table)->insert(['cat_grupos_captura_id' => 1, 'cat_grupable_id' => 1, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 2, 'cat_grupable_id' => 2, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 3, 'cat_grupable_id' => 3, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 4, 'cat_grupable_id' => 4, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 5, 'cat_grupable_id' => 5, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 6, 'cat_grupable_id' => 6, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 7, 'cat_grupable_id' => 7, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 8, 'cat_grupable_id' => 8, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 9, 'cat_grupable_id' => 9, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 10, 'cat_grupable_id' => 10, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 11, 'cat_grupable_id' => 11, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 12, 'cat_grupable_id' => 12, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 13, 'cat_grupable_id' => 13, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 14, 'cat_grupable_id' => 14, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 15, 'cat_grupable_id' => 15, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 16, 'cat_grupable_id' => 16, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 17, 'cat_grupable_id' => 17, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 18, 'cat_grupable_id' => 18, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 19, 'cat_grupable_id' => 19, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 20, 'cat_grupable_id' => 20, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 21, 'cat_grupable_id' => 21, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 22, 'cat_grupable_id' => 22, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 23, 'cat_grupable_id' => 23, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 24, 'cat_grupable_id' => 24, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 25, 'cat_grupable_id' => 25, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 26, 'cat_grupable_id' => 26, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 27, 'cat_grupable_id' => 27, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 28, 'cat_grupable_id' => 28, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 29, 'cat_grupable_id' => 29, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 30, 'cat_grupable_id' => 30, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 31, 'cat_grupable_id' => 31, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 32, 'cat_grupable_id' => 32, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 33, 'cat_grupable_id' => 14, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 34, 'cat_grupable_id' => 16, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 35, 'cat_grupable_id' => 20, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 36, 'cat_grupable_id' => 5, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),

            
$datos = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 45, 46];

// Recorremos el array utilizando un bucle foreach
        foreach ($datos as $dato) {
            DB::table($table)->insert(['cat_grupos_captura_id' => 37, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 38, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 41, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 43, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 46, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 47, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 49, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 51, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 53, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 54, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 55, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 56, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 57, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 58, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 60, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 61, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 62, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 63, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 64, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 68, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 69, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 70, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 73, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 74, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 75, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 76, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 77, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 78, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 79, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 80, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 81, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 82, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 83, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 84, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 85, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 86, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 87, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 88, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 89, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 90, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 91, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 92, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 93, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 94, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 95, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 96, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 97, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 98, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 99, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 100, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 101, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 102, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 103, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 104, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 105, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 106, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 107, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
            DB::table($table)->insert(['cat_grupos_captura_id' => 109, 'cat_grupable_id' => $dato, 'cat_grupable_type' => 'App\Models\Cat\Cat_entidades_federativa','created_at' => now()]); //,1),
        }
     //grupo_captura_sp_user`

     DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

    }
}
