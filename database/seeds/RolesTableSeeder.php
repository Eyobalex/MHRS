<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('roles')->truncate();
        $admin = new \App\Role();
        $admin->name = "admin";
        $admin->display_name = "Admin";
        $admin->save();
        $user1 = \App\User::findOrFail(1);
        $user1->detachRole($admin);
        $user1->attachRole($admin);

        $lessor = new \App\Role();
        $lessor->name = "lessor";
        $lessor->display_name = "Lessor";
        $lessor->save();
        $user2 = \App\User::findOrFail(2);
        $user2->detachRole($lessor);
        $user2->attachRole($lessor);


        $subtenant = new \App\Role();
        $subtenant->name = "subtenant";
        $subtenant->display_name = "Subtenant";
        $subtenant->save();
        $user3 = \App\User::findOrFail(3);
        $user3->detachRole($subtenant);
        $user3->attachRole($subtenant);


    }
}
