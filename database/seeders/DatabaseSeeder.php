<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        

      
        
        $this->call([
            PermissionSeeder::class,
            UserSeeder::class,
            // MenuSeeder::class,
            // NavigationSettingSeeder::class,
            // MediaTypeSeeder::class,
            // MediaSeeder::class, 
            // SocialMediaTableSeeder::class,
            // FooterLinkTableSeeder::class,
            // SiteFeaturesSeeder::class,
            // CategorySeeder::class,
            // CategoryPostSeeder::class,
            // ProductSeeder::class,
            // ContactFormSeeder::class,
            // SubscriberSeeder::class,
            // FaqSeeder::class

        ]);
    }
}
