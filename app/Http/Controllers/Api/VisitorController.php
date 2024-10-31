<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
// use Illuminate\Support\Carbon;

class VisitorController extends Controller
{
    //


    
    /**
     * Returns the Count of the page visitors and increment the visitor count    
     * 
     */
    public function adder(){

        $date = Carbon::today();
// dd($date);
        $visitor = Visitor::firstOrCreate(['date' => $date]);
        $totalvisits=Visitor::sum('count');
        $visitor->count = $visitor->count + 1;
        $visitor->save();

        return response()->json(['total visits' => $totalvisits, 'daily visit' => $visitor->count]);
        // return response()->json(['count' => $visitCount->count]);
    }
}
