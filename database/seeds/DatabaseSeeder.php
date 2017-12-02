<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 1; $i < 11; $i++) {
            DB::table('countries')->insert(['name' => 'Country ' . $i]);
        }
        for ($i = 1; $i < 21; $i++) {
            DB::table('cities')->insert(['name' => 'City ' . $i, 'country_id' => rand(1, 10)]);
        }
        for ($i = 1; $i < 21; $i++) {
            DB::table('authors')->insert(['name' => 'Author ' . $i, 'city_id' => rand(1, 21)]);
        }
    }
}

