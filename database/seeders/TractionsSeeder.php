<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Traction;

class TractionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Traction::insert([
            [
                'icon' => 'fas fa-users',
                'highlight' => '500k+',
                'description' => 'Active Users Worldwide',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fas fa-store',
                'highlight' => '1.2k+',
                'description' => 'Retailers Onboarded',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fas fa-briefcase',
                'highlight' => '300+',
                'description' => 'Enterprise Clients',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fas fa-globe',
                'highlight' => '25+',
                'description' => 'Countries Served',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
