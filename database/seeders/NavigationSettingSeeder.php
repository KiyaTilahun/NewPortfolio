<?php

namespace Database\Seeders;

use App\General\AccessControlEnum;
use App\General\FontSizeEnum;
use App\General\FontStyleEnum;
use App\General\TargetEnum;
use App\Models\Setting;
use App\Models\Settingtype;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NavigationSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //


        // Font size
//         $fontSizeArray = [
//             'small' => '12px',
//             'medium' => '16px',
//             'large' => '20px',
//         ];
//         // Targets
//         $linkTargetsArray = [
//             'self' => '_self',
//             'blank' => '_blank',
//             'parent' => '_parent',
//             'top' => '_top',
//         ];

//         // font -style
//         $fontStylesArray = [
//             'normal' => 'normal',
//             'italic' => 'italic',
//             'oblique' => 'oblique',
//             'bold' => 'bold',
//             'light' => 'light',
//             'underline' => 'underline',
//         ];
//         $accessLevelsArray = [
//             'public' => 'public',
//             'private' => 'private',
//             'protected' => 'protected',
//         ];

// $navigation=Setting::create(['name'=>'NAVIGATION']);

// // dd($option);
//         $settings = [
//             [
//                 'setting_id' => $navigation->id,
//                 'type' => 'Options',
//                 'name' => 'Font-size',
//                 'option' => json_encode($fontSizeArray),
//             ],
//             [
//                 'setting_id' => $navigation->id,
//                 'type' => 'Options',
//                 'name' => 'Target',
//                 'option' => json_encode($linkTargetsArray),
//                 'boolean' => null,
//             ],
//             [
//                 'setting_id' =>$navigation->id,
//                 'type' => 'Options',
//                 'name' => 'Font-style',
//                 'option' => json_encode($fontStylesArray),
//                 'boolean' => null,
//             ],
//             [
//                 'setting_id' => $navigation->id,
//                 'type' => 'Options',
//                 'name' => 'Access-Control',
//                 'option' => json_encode($accessLevelsArray),
//                 'boolean' => null,
//             ],
//             // Add more settings as needed
//         ];

//         // dd($settings);
//         // Insert the settings into the database
//         foreach ($settings as $setting) {
//             DB::table('settingcategories')->insert([
//                 'setting_id' => $setting['setting_id'],
//                 'type' => $setting['type'],
//                 'name' => $setting['name'],
//                 'option' => $setting['option'],
                
//             ]);
//         }
        
    }
}
