<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\InvestmentPlan;

class InvestmentPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InvestmentPlan::insert([
            [
                'title' => 'SHORT TERM - MUDARABAH TRADING PROJECT ’25',
                'short_description' => 'Start from BDT 100,000 for 6 months at 7.5%-9% profit',
                'details' => 'This is a short term mudarabah project with ethical investment opportunities...',
                'button_text' => 'View Details',
                'button_apply' => 'Apply Now',
                'apply_link' => 'https://forms.gle/example1', // replace with actual form
                'image_1' => null,
                'image_2' => null,
                'image_3' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'OUTLET PROJECT',
                'short_description' => 'Invest for 3 years with minimum BDT 100,000',
                'details' => 'Invest in our outlet project to earn up to 25% profit per annum...',
                'button_text' => 'View Details',
                'button_apply' => 'Apply Now',
                'apply_link' => 'https://forms.gle/example2',
                'image_1' => null,
                'image_2' => null,
                'image_3' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'RETAIL DISTRIBUTION INVESTMENT PROJECT ’25',
                'short_description' => 'Invest for 1 year with minimum ticket size BDT 200,000',
                'details' => 'Expected 15%–19% profit per annum from retail distribution investments...',
                'button_text' => 'View Details',
                'button_apply' => 'Apply Now',
                'apply_link' => 'https://forms.gle/example3',
                'image_1' => null,
                'image_2' => null,
                'image_3' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'HONEY INVESTMENT PROJECT ’25',
                'short_description' => 'Invest for 1 year with minimum ticket size BDT 100,000',
                'details' => 'Expected 16%–20% profit per annum from honey production project...',
                'button_text' => 'View Details',
                'button_apply' => 'Apply Now',
                'apply_link' => 'https://forms.gle/example4',
                'image_1' => null,
                'image_2' => null,
                'image_3' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
