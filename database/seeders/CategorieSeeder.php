<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'nom' => 'Action',
        ]);

        DB::table('categories')->insert([
            'nom' => 'Comedie',
        ]);

        DB::table('categories')->insert([
            'nom' => 'Aventure',
        ]);

        DB::table('categories')->insert([
            'nom' => 'Science-Fiction',
        ]);

        DB::table('categories')->insert([
            'nom' => 'Documentaire',
        ]);


    }
}
