<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Filter\V1\FaqFilter;
use App\Http\Resources\FaqResource;
use App\Models\WebContents\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    //
    /** Display  all FAQs
     * 
    * @queryParam filters[active] boolean Filter by Active status. Example: `filters[active]=1`
    */
    public function index(FaqFilter $filter){


        return FaqResource::collection(Faq::filter($filter)->get());

    }
    public function show()
    {
        // $features = Faq::all();
        // // dd($features);
        // if ($features == null) {
        //     return response()->json(['status' => 'Not Found', 'message' => "No Link Found with the Name " ], 404);
        // } else {

        //     $faqs = Faq::select('question', 'answer', 'is_active')->get();
        //     // return response()->json($faqs,200);
        //     // checking with the view

        //     return view('faqsdemo',compact('faqs'));
           

            
        // }
    }

}
