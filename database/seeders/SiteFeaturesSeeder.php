<?php

namespace Database\Seeders;

use App\Models\WebContents\SiteFeature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteFeaturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        SiteFeature::factory()->count(2)->create();

        SiteFeature::create([
            'name' => 'carousel',
            'title' => 'Sample Carousel Title',
            'description' => 'Sample description for the carousel.',
            'data' => [
                [
                    'title' => 'Carousel Item 1',
                    'image' => 'images/social-logos/image-5.jpg', // Static image path
                    'icon' => 'icon-1',
                    'visibility' => true,
                    'description' => 'Description for carousel item 1.',
                    'more' => true,
                    'subtitle' => 'Subtitle 1',
                    'rating' => 4,
                ],
                [
                    'title' => 'Carousel Item 2',
                    'image' => 'images/social-logos/image-5.jpg', // Static image path
                    'icon' => 'icon-2',
                    'visibility' => true,
                    'description' => 'Description for carousel item 2.',
                    'more' => false,
                    'subtitle' => 'Subtitle 2',
                    'rating' => 3,
                ],
                [
                    'title' => 'Carousel Item 3',
                    'image' => 'images/social-logos/image-5.jpg', // Static image path
                    'icon' => 'icon-3',
                    'visibility' => true,
                    'description' => 'Description for carousel item 3.',
                    'more' => true,
                    'subtitle' => 'Subtitle 3',
                    'rating' => 5,
                ]
            ],
            'is_visible' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        SiteFeature::create([
            'name' => 'Testimonials',
            'title' => 'Customer Tetminoials',
            'description' => 'Sample description for the Testimonials.',
            'data' => [
                [
                    "image" => "images/siteFeatures/kiya.jpg",
                    "title" => "Mr.Kiya Tilahun",
                    "rating" => 5,
                    "subtitle" => "CEO of Chapa",
                    "visibility" => true,
                    "more" => true,
                    "description" => "<p>This is one of the best companies out there</p>"
                ],
                [
                    "image" => "images/siteFeatures/messi.jpg",
                    "title" => "Mr.Lionel Messi",
                    "rating" => 4,
                    "subtitle" => "CEO of Football",
                    "visibility" => true,
                    "more" => true,
                    "description" => "<p>This is one of the best companies out there,it helped me with my football career</p>"
                ],

                [
                    "image" => "images/siteFeatures/tedy.jpg",
                    "title" => "Mr.Tedy Afro",
                    "rating" => 5,
                    "subtitle" => "CEO of Music",
                    "more" => true,
                    "visibility" => true,
                    "description" => "<p>This is one of the best companies out there</p>"
                ],
            ],
            'is_visible' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
