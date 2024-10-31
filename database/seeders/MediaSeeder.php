<?php

namespace Database\Seeders;

use App\Models\General\MediaCategory;
use App\Models\General\MediaItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $parentCategories = [
            ['name' => 'Projects', 'parent_id' => null],
            ['name' => 'Events', 'parent_id' => null],
        ];

        foreach ($parentCategories as $category) {
            MediaCategory::create($category);
        }

        $mediaItems = [
            [
                'media_type_id' => 1,
                'media_category_id' =>1,
                'file_path' => json_encode(['images/social-logos/image-6.jpg']),
                'file_label' => 'Company Logo',
                'description' => 'This is the company logo.',
            ],
            [
                'media_type_id' => 1,
                'media_category_id' => 1,
                'file_path' => json_encode(['images/social-logos/image-6.jpg']),
                'file_label' => 'Event Highlights',
                'description' => 'Video highlights from the event.',
            ],
            [
                'media_type_id' => 1,
                'media_category_id' => 1,
                'file_path' => json_encode(['images/social-logos/image-6.jpg']),
                'file_label' => 'Flyer Document',
                'description' => 'Event flyer in PDF format.',
            ],
        ];

        foreach ($mediaItems as $item) {
            MediaItem::create($item);
        }

    }
}
