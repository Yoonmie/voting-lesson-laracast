<?php

namespace Database\Seeders;

use App\Models\CommunityLink;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CommunityLinkSeeder::class);
        // $this->call(CommunitySeeder::class);
        // \App\Models\User::factory(10)->create();
        // \App\Models\CommunityLink::factory(10)->create();
    }
}
