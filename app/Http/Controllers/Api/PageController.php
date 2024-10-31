<?php

namespace App\Http\Controllers\Api;

use App\Filament\Resources\General\SocialmediaResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\FaqResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\SiteFeatureResource;
use App\Http\Resources\SocialResource;
use App\Models\WebContents\Page;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

use function Pest\Laravel\json;

class PageController extends Controller
{
    //
    // public function index() {}


    /**
     * Display the specific Page  
     * 
     * @queryParam pagination[productperpage] Paginate the Products. Example: `productperpage=Number`
     * @urlParam name string required The NAME of the Page.
     * if pagination is used the other pages will be returned as pages/PAGENAME?productperpage=1&page=2
     * @response 200 {
     *   
     *   "siteFeatures": [
     *     {
     *       "type": "web contents",
     *       "exampleName": {
     *         "visible": true,
     *         "title": "Example Title",
     *         "description": "Example description text.",
     *         "attributes": [
     *           {
     *             "icon": "example-icon",
     *             "image": "images/example.jpg",
     *             "title": "Example Attribute Title",
     *             "rating": 5,
     *             "subtitle": "Example Subtitle",
     *             "page_names": ["home", "about"],
     *             "visibility": true,
     *             "description": "Detailed description."
     *           }
     *         ],
     *         "seo": {
     *           "title": "Example SEO Title",
     *           "description": "Example SEO Description"
     *         }
     *       }
     *     }
     *   ],
     *   "faqs": [
     *     {},{}
     *   ],
     *   "socialMedias": [
     *     {
     *       {},{}
     *     }
     *   ],
     *   "products": [
     *    {},{}
     *   ]
     * }
     * }
     */
    public function show(Page $page)
    {

        $pagedata = [];
        if ($page->siteFeatures()) {
            $siteFeatures = SiteFeatureResource::collection($page->siteFeatures()->where('is_visible', true)->get());
        }

        if ($page->faqs()) {
            $faqs = FaqResource::collection($page->faqs()->get());
        }

        if ($page->socialMedias()) {
            $socialMedias = SocialResource::collection($page->socialMedias()->where('is_visible', true)->get());
        }
        if ($page->products()) {
            $productsQuery = $page->products()->where('is_available', true);
            if (request()->query('productperpage')) {
                $productperpage = request()->query('productperpage');
                if ($productperpage >= 1) {
                    $currentPage = LengthAwarePaginator::resolveCurrentPage();
                    $total = $productsQuery->count();
                    $allproducts = $productsQuery->forPage($currentPage, $productperpage)->get();
                    $products = new LengthAwarePaginator(
                        ProductResource::collection($allproducts),
                        $total,
                        $productperpage,
                        $currentPage,
                        ['path' => LengthAwarePaginator::resolveCurrentPath()]
                    );


                    $products->appends(['productperpage' => $productperpage]);
                } else {
                    
                    $products = $productsQuery->get();
                }
            } else {
              
                $products = $productsQuery->get();
            }
            // $products = ProductResource::collection($page->products()->where('is_available', true)->get());







            // dd($productsPaginator);

            // return response()->json($productsPaginator);
        }

        // Combine everything into a single response
        return response()->json([
            'siteFeatures' => $siteFeatures ?? [],
            'faqs' => $faqs ?? [],
            'socialMedias' => $socialMedias ?? [],
            'products' => $products ?? [],


        ]);
    }
}
