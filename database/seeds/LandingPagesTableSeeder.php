<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class LandingPagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('landing_pages')->insert([
            [
                'user_id' => 1,
                'domain' => '52.174.253.144',
                'name' => 'Right Co',
                'slug' => str_slug('Right Co'),
                'email' => 'geral@rightco.pt',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 1,
                'domain' => '52.174.253.144',
                'name' => 'Nossa Freguesia',
                'slug' => str_slug('Nossa Freguesia'),
                'email' => 'geral@nossafreguesia.pt',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 1,
                'domain' => '52.174.253.144',
                'name' => 'on4web',
                'slug' => str_slug('on4web'),
                'email' => 'geral@on4web.pt',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 1,
                'domain' => '52.174.253.144',
                'name' => 'NTWeb',
                'slug' => 'index',
                'email' => 'geral@ntweb.pt',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 2,
                'domain' => 'macau.grandtour.pt',
                'name' => 'Grand Tour',
                'slug' => str_slug('Grand Tour'),
                'email' => 'geral@grandtour.pt',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
