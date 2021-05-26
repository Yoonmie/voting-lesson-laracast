<?php

namespace Database\Seeders;

use App\Models\CommunityLink;
// use Database\Factories\CommunityLinkFactory;
use Illuminate\Database\Seeder;

class CommunityLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CommunityLink::factory()->times(50)->create();
    }
}
