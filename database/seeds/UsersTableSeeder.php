<?php

use LandingPages\Role;
use LandingPages\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleClient = Role::where('name', 'client')->first();
        $roleManager  = Role::where('name', 'manager')->first();

        $client = new User();
        $client->name = 'NTWeb Client';
        $client->email = 'geral@ntweb.pt';
        $client->password = bcrypt('123qwe');
        $client->created_at = Carbon::now();
        $client->updated_at = Carbon::now();
        $client->save();

        $client->roles()->attach($roleClient);

        $client = new User();
        $client->name = 'Grand Tour';
        $client->email = 'geral@grandtour.pt';
        $client->password = bcrypt('123qwe');
        $client->created_at = Carbon::now();
        $client->updated_at = Carbon::now();
        $client->save();

        $client->roles()->attach($roleClient);

        $manager = new User();
        $manager->name = 'NTWeb Admin';
        $manager->email = 'admin@admin.com';
        $manager->password = bcrypt('123qwe');
        $manager->created_at = Carbon::now();
        $manager->updated_at = Carbon::now();
        $manager->save();

        $manager->roles()->attach($roleManager);
    }
}
