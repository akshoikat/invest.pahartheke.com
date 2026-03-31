<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::insert([

            'logo' => 'uploads/logo.png',
            'company_name' => 'Shop24 Limited',
            'company_description' => 'Aliqua Laboris qui',

            'customer_care_phone_1' => '+8801700000000',
            'customer_care_phone_2' => '+8801800000000',
            'customer_care_email'   => 'care@shop24.com',

            'corporate_phone' => '+8801900000000',
            'corporate_email' => 'corporate@shop24.com',

            'investment_phone' => '+8801600000000',
            'investment_email' => 'invest@shop24.com',

        
            'office_address' => 'House 24, Road 7, Dhanmondi, Dhaka',
            'general_email' => 'info@shop24.com',
            'google_play_link' => 'https://play.google.com/store/apps/details?id=com.shop24',

            'created_at' => now(),
            'updated_at' => now(),
            
            
        ]);
    }
}
