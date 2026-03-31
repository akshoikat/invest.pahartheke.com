<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Faq::insert([
            [
                'question' => 'How do I create an account?',
                'answer' => 'Click on the Sign Up button on the top right and fill out the registration form.',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'How can I reset my password?',
                'answer' => 'Go to the login page and click on “Forgot Password” to receive a reset link.',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Where can I view my order history?',
                'answer' => 'Log in to your dashboard and click on the “My Orders” tab.',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'How do I contact customer support?',
                'answer' => 'You can reach us at support@yourdomain.com or via the live chat option on the website.',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
