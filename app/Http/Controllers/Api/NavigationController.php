<?php

namespace App\Http\Controllers\Api;

use App\ApiResponse;
use App\Filament\Resources\Navigation\MenuitemResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\NaviagationResource;
use App\Models\Navigation\Menu;
use App\Models\Navigation\Menuitem;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    //
    use ApiResponse;

    /**
     * Display  all Navigations
     * 
     */
    public function index(){
        // dd(Menuitem::all()->groupBy('menu_id'));
        // return NaviagationResource::collection(Menuitem::all()->groupBy('menu_id'));
        $navigations = Menuitem::whereHas('menu', function ($query) {
            $query->where('visibility', true);
        })->where('visibility',true)->get()->groupBy('menu_id');
        // dd($navigations);
        $groupedNavigations = $navigations->mapWithKeys(function ($items, $menu_id) {
          
            return 
                [ $items->first()->menu->name=>
                ['navigations' => NaviagationResource::collection($items->sortBy('order'))]];
                // ['navigations' => NaviagationResource::collection($items)];
        });
        // dd($groupedNavigations);
        if (!isset($groupedNavigations)) {

            return $this->error("Nothing Found");
        }
        return response()->json($groupedNavigations);

    }



      /**
     * Display the specific Navigations  
     * 
     * @urlParam name string required The NAME of the Navigation Section.
     */
    
    public function show($navitem)
    {
        //

        $feature = Menu::where('name', $navitem)->with('Menuitems')->first();
      
        if (!isset($feature)) {
            return $this->error("Nothing Found");
        }
        return  NaviagationResource::collection($feature->menuitems);
    }

    public function demoshower()
    {


        return view('demonavs');
    }
}
