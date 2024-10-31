<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialMediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample data for social media table
        $socialMediaData = [
            [
                'name' => 'Partners',
                'social' => json_encode([
                    [
                        'sociallink' => 'Awash Bank',
                        'linkaddress' => 'https://partnersite1.com',
                        'upload_image' => true,
                        'image' => 'images/social-logos/partners1.png', // Adjust the path accordingly
                        'use_url' => false,
                        'url' => null,
                        'use_svg' => false,
                        'html_icon' => null,
                    ],
                    [
                        'sociallink' => 'Ayat Homes',
                        'linkaddress' => 'https://partnersite2.com',
                        'upload_image' => true,
                        'image' => 'images/social-logos/partners2.png',  // Adjust the path accordingly
                        'use_url' => false,
                        'url' => null,
                        'use_svg' => false,
                        'html_icon' => null,
                    ],
                    [
                        'sociallink' => 'Amole',
                        'linkaddress' => 'https://partnersite2.com',
                        'upload_image' => true,
                        'image' => 'images/social-logos/partners3.png',  // Adjust the path accordingly
                        'use_url' => false,
                        'url' => null,
                        'use_svg' => false,
                        'html_icon' => null,
                    ],
                    [
                        'sociallink' => 'Addis Ababa',
                        'linkaddress' => 'https://partnersite2.com',
                        'upload_image' => true,
                        'image' => 'images/social-logos/partners5.png',  // Adjust the path accordingly
                        'use_url' => false,
                        'url' => null,
                        'use_svg' => false,
                        'html_icon' => null,
                    ]
                ]),
            ],
            [
                'name' => 'Sponsors',
                'social' => json_encode([
                    [
                        'sociallink' => 'Ethio Telecom',
                        'linkaddress' => 'https://sponsorsite1.com',
                        'upload_image' => false,
                        'image' => null,
                        'use_url' => true,
                        'url' => 'https://sponsorsite1.com/logo.png',
                        'use_svg' => false,
                        'html_icon' => null,
                    ],
                    [
                        'sociallink' => 'Hilton',
                        'linkaddress' => 'https://sponsorsite2.com',
                        'upload_image' => true,
                        'image' => 'images/social-logos/sponsors1.png',  // Adjust the path accordingly
                        'use_url' => false,
                        'url' => null,
                        'use_svg' => false,
                        'html_icon' => null,
                    ],
                    [
                        'sociallink' => 'Ethio Telecome',
                        'linkaddress' => 'https://sponsorsite2.com',
                        'upload_image' => true,
                        'image' => 'images/social-logos/sponsors2.png',  // Adjust the path accordingly
                        'use_url' => false,
                        'url' => null,
                        'use_svg' => false,
                        'html_icon' => null,
                    ],
                    [
                        'sociallink' => 'Chapa',
                        'linkaddress' => 'https://sponsorsite2.com',
                        'upload_image' => true,
                        'image' => 'images/social-logos/sponsors4.png',  // Adjust the path accordingly
                        'use_url' => false,
                        'url' => null,
                        'use_svg' => false,
                        'html_icon' => null,
                    ]
                ]),
            ],
            // Add more entries as needed
        ];

        foreach ($socialMediaData as $data) {
            DB::table('socialmedia')->updateOrInsert(
                ['name' => $data['name']], // Check if record exists
                ['social' => $data['social']] // Data to insert
            );
        }
    }
}
