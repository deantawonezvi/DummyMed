<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patients')->delete();

        $faker = \Faker\Factory::create();

        for($i =0; $i<50; $i++){
            \App\Patient::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'sex' => $faker->numberBetween(1, 2),
                'patient_number' => $faker->numberBetween(100023, 300212),
                'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'active' => $faker->numberBetween(0, 1),
            ]);
        }
    }
}
