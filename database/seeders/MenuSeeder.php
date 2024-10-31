<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $menus = [
            ['name' => 'Main Menu'],
            ['name' => 'Footer Menu'],
        ];

        foreach ($menus as $menu) {
            DB::table('menus')->updateOrInsert(
                ['name' => $menu['name']], // Check if record exists
                $menu // Data to insert
            );
        }

        // Seed menuitems table
        $menuItems = 
        [
            ['menu_id' => 1, 'name' => 'Home', 'url' => '/', 'icon' => null, 'hasSubmenu' => false, 'submenus' => null, 'order' => 1, 'visibility' => true],
            ['menu_id' => 1, 'name' => 'About Us', 'url' => '/about', 'icon' => null, 'hasSubmenu' => true, 'submenus' => json_encode([
                ['title' => 'Our Team', 'url' => '/about/team', 'visibility' => true],
                ['title' => 'Our History', 'url' => '/about/history', 'visibility' => true],
            ]), 'order' => 2, 'visibility' => true],
            ['menu_id' => 1, 'name' => 'Services', 'url' => '/services', 'icon' => null, 'hasSubmenu' => true, 'submenus' => json_encode([
                ['title' => 'Consulting', 'url' => '/services/consulting', 'visibility' => true],
                ['title' => 'Development', 'url' => '/services/development', 'visibility' => true],
                ['title' => 'Design', 'url' => '/services/design', 'visibility' => true],
            ]), 'order' => 3, 'visibility' => true],
            ['menu_id' => 1, 'name' => 'Contact', 'url' => '/contact', 'icon' => null, 'hasSubmenu' => false, 'submenus' => null, 'order' => 4, 'visibility' => true],
            
            // For 'Footer Menu'
            ['menu_id' => 2, 'name' => 'Privacy Policy', 'url' => '/privacy', 'icon' => null, 'hasSubmenu' => false, 'submenus' => null, 'order' => 1, 'visibility' => true],
            ['menu_id' => 2, 'name' => 'Terms of Service', 'url' => '/terms', 'icon' => null, 'hasSubmenu' => false, 'submenus' => null, 'order' => 2, 'visibility' => true],
        ];
            

        foreach ($menuItems as $item) {
            DB::table('menuitems')->updateOrInsert(
                ['menu_id' => $item['menu_id'], 'name' => $item['name']], // Check if record exists
                $item // Data to insert
            );
        }
    }
}
