<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FooterLinkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('footerlinks')->insert([
            [
                'name' => 'ABOUT_US',
                'is_visible' => true,
                'url' => '/about-us', // Add URL
                'data' => json_encode([
                    'has_title' => true,
                    'title' => 'About Us',
                    'is_logo' => true,
                    'image' => 'images/footerlogos/about-us.png',
                    'has_description' => true,
                    'description' => 'Learn more about our company and values.',
                    'meta_title' => 'About Us - Company',
                    'meta_description' => 'Discover more about our company, mission, and values.',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'CONTACT',
                'is_visible' => true,
                'url' => '/contact-us', // Add URL
                'data' => json_encode([
                    'has_title' => true,
                    'title' => 'Contact Us',
                    'is_logo' => false,
                    'has_description' => true,
                    'description' => 'Get in touch with us for any inquiries or support.',
                    'meta_title' => 'Contact Us',
                    'meta_description' => 'Reach out to our team for any questions or assistance.',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'DISCLAIMER',
                'is_visible' => true,
                'url' => '/disclaimer',
                'data' => json_encode([
                    'has_title' => true,
                    'title' => 'Disclaimer',
                    'is_logo' => false,
                    'has_description' => true,
                    'description' => 'Please read our disclaimer regarding the use of this website.',
                    'meta_title' => 'Disclaimer',
                    'meta_description' => 'Important legal information about the content on this website.',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ]
            // Add more entries as needed...
        ]);
    }
}
