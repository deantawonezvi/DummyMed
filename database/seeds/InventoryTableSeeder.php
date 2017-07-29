<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inventories')->delete();

        $faker = \Faker\Factory::create();

        for($i =0; $i<50; $i++){
            \App\Inventory::create([
                'name' => $faker->company,
                'type' => $faker->domainName,
                'description' => $faker->realText(50),
                'quantity' => $faker->numberBetween(1, 300)

            ]);
        }
    }
}
