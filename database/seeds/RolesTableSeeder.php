<?php

use LandingPages\Role;
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
        $roleClient = new Role();
        $roleClient->name = 'client';
        $roleClient->display_name = 'Client Role';
        $roleClient->description = 'A Client User';
        $roleClient->save();

        $roleManager = new Role();
        $roleManager->name = 'manager';
        $roleManager->display_name = 'Manager Role';
        $roleManager->description = 'A Manager User';
        $roleManager->save();
    }
}
