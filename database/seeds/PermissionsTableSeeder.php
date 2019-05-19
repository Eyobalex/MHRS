<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('permissions')->truncate();
        \Illuminate\Support\Facades\DB::table('permission_role')->truncate();
        $cudHouse = new \App\Permission();
        $cudHouse->name = "cud-house";
        $cudHouse->save();

        $readHouse = new \App\Permission();
        $readHouse->name = "read-house";
        $readHouse->save();

        $deleteOthersHouse = new \App\Permission();
        $deleteOthersHouse->name = "delete-others-house";
        $deleteOthersHouse->save();

        $banUser = new \App\Permission();
        $banUser->name = "ban-user";
        $banUser->save();

        $deleteUser = new \App\Permission();
        $deleteUser->name = "delete-user";
        $deleteUser->save();

        $reportUser = new \App\Permission();
        $reportUser->name = "report-user";
        $reportUser->save();

        $admin = \App\Role::whereName('admin')->first();
        $admin->attachPermissions([$readHouse, $banUser, $deleteUser, $deleteOthersHouse]);
        $lessor = \App\Role::whereName('lessor')->first();
        $lessor->attachPermissions([$cudHouse, $readHouse, $reportUser]);
        $subtenant = \App\Role::whereName('subtenant')->first();
        $subtenant->attachPermissions([$readHouse, $reportUser]);



    }
}
