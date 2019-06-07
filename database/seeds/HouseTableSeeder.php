<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HouseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('houses')->truncate();

        $date = \Carbon\Carbon::now();
        $faker =\Faker\Factory::create();
        $houses = [];
        $area = rand(175, 1000);
        $type = ['Roommate', 'Apartment', 'house'];

        for ($i = 1; $i<=10; $i++){
            $houses[] = [
                'title' =>  $faker->words(rand(2,4), true),
                'price' => rand(5000, 30000),
                'description' =>  $faker->paragraphs(1, true),
                'slug' => $faker->words(rand(2,4), true),
                'lessor_id' => rand(1,3),
                'created_at' => $date,
                'updated_at' => $date,
                'location' => $faker->words(2, true),
                'photo_id' => rand(1,10),
                'views' => rand(10, 50),
                'area' => "{$area} m",
                'bedroom' => rand(0,3),
                'bath' => rand(0,3),
                'type' => $type[rand(0,2)],
                'status' => "rent"
            ];
        }

        DB::table('houses')->insert($houses);
    }
}
