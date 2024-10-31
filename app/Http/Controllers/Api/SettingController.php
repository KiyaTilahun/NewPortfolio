<?php

namespace App\Http\Controllers\Api;

use App\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\SettingResource;
use App\Models\Setting;
use App\Models\Settingcategory;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use ApiResponse;

    //
    /** Display  all Settings
     * 
     *
     */
    public function index()
    {

        //   $settings = Setting::all()->groupBy('settingcategory_id');
        //   $groupedSettings = $settings->mapWithKeys(function ($items, $settingcategory_id) {
        //       return [
        //           $items->first()->settingcategory->name => 
        //                SettingResource::collection($items->sortBy('name'))

        //       ];
        //   });
        $settings = Setting::all()->groupBy('settingcategory_id');
        $groupedSettings = $settings->mapWithKeys(function ($items, $settingcategory_id) {
            return [
                $items->first()->settingcategory->name => $items->sortBy('name')->flatMap(function ($item) {
                    return [$item->name => $item->value];
                }),
            ];
        });


        if ($groupedSettings->isEmpty()) {
            return response()->json(['error' => 'Nothing Found'], 404);
        }

        return response()->json($groupedSettings, 200);
    }

    /**
     * Display the specific Setting  
     * 
     * @urlParam name string required The NAME of the Navigation Section.
     */

    public function show($setting)
    {
        //

        // $feature = Settingcategory::where('name', $setting)->with('Settings')->first();

        // if (!isset($feature)) {
        //     return $this->error("Nothing Found");
        // }
        // return  SettingResource::collection($feature->Settings);

        $feature = Settingcategory::where('name', $setting)->with('settings')->first();

        if (!isset($feature)) {
            return $this->error("Nothing Found");
        }
    
        // Flatten the settings into a single associative array
        $flattenedSettings = $feature->settings->sortBy('name')->flatMap(function ($item) {
            return [$item->name => $item->value];
        });
    
        return response()->json([$feature->name => $flattenedSettings]);
    }
}
