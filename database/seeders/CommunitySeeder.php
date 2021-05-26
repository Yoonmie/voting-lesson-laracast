<?php

namespace Database\Seeders;

use App\Models\CommunityLink;
use Database\Factories\CommunityFactory;
use Illuminate\Database\Seeder;

class CommunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CommunityFactory::factory()->times(5)->create();
        // CommunityLink::factory()->create()->count(5);but ma ya wu. model mr ma shi lo lr?
        
    }
}
