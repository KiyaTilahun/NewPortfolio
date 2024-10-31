<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MediaTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $mediaTypes = [
            ['name' => 'Image'],
            ['name' => 'Video'],
            ['name' => 'Document'],
            ['name' => 'Audio'],
            ['name' => 'Mixed'],

        ];

        // Insert sample data into the media_types table
        DB::table('media_types')->insert($mediaTypes);
        
        



    }
}
