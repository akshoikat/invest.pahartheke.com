<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FactSheet;

class FactSheetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       FactSheet::insert([
            [
                'icon' => 'fas fa-handshake',
                'highlight_text' => '98%',
                'description' => 'Customer Satisfaction Rate',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fas fa-coins',
                'highlight_text' => '$5M+',
                'description' => 'Total Investment Raised',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fas fa-chart-line',
                'highlight_text' => '250%',
                'description' => 'Year-on-Year Growth',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fas fa-project-diagram',
                'highlight_text' => '120+',
                'description' => 'Projects Delivered',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
