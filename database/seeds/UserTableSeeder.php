<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::table('users')->truncate();

        $faker = \Faker\Factory::create();
        $date = \Carbon\Carbon::now();


        DB::table('users')->insert([
            [
                'name' => 'Don Joe',
                'email' => 'don@test.com',
//                'slug' => 'don_joe',
                'bio' => $faker->paragraph(1, true),
                'password' => bcrypt('12345'),
                'created_at' => $date,
                'updated_at' => $date,
                'status' => 'accepted'
            ],
            [
                'name' => 'Jane doe',
                'email' => 'jane@test.com',
//                'slug' => 'jane_do',
                'bio' => $faker->paragraph(1, true),
                'password' => bcrypt('12345'),
                'created_at' => $date,
                'updated_at' => $date,
                'status' => 'accepted'
            ],
            [
                'name' => 'John Doe',
                'email' => 'john@test.com',
//                'slug' => 'john_doe',
                'bio' => $faker->paragraph(1, true),
                'password' => bcrypt('12345'),
                'created_at' => $date,
                'updated_at' => $date,
                'status' => 'accepted'
            ]
        ]);
    }
}
