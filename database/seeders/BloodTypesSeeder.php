<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blood_types')->delete();

        DB::table('blood_types')->insert([
            'name' => 'A+',
        ]);

        DB::table('blood_types')->insert([
            'name' => 'A-',
        ]);

        DB::table('blood_types')->insert([
            'name' => 'B+',
        ]);

        DB::table('blood_types')->insert([
            'name' => 'B-',
        ]);
        DB::table('blood_types')->insert([
            'name' => 'O+',
        ]);

        DB::table('blood_types')->insert([
            'name' => 'O-',
        ]);
        DB::table('blood_types')->insert([
            'name' => 'AB+',
        ]);

        DB::table('blood_types')->insert([
            'name' => 'AB-',
        ]);
    }
}
