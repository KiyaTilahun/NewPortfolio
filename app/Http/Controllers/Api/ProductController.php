<?php

namespace App\Http\Controllers\Api;

use App\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Filter\V1\ProductFilter;
use App\Http\Resources\ProductResource;
use App\Models\Products\Product;
use Illuminate\Http\Request;

use function Pest\Laravel\json;

class ProductController extends Controller
{
    //
    use ApiResponse;
    /**
     * Display a all of the products.
     * 
     * @queryParam filters[name] Filter string Name.
     * @queryParam filters[is_available] boolean Filter  by Availability.
     * @queryParam filters[type] Filter by Product Type relation name. Example: `filters[product_type]=electronics`
     */
    public function index(ProductFilter $filter)
    {
        //
        // comment


        return ProductResource::collection(Product::filter($filter)->orderBy('created_at', 'desc')->paginate(6));
    }


    /**
     * Display Specific Product
     * 
     *  @urlParam id integer required The ID of the product.
     */
    public function show(Product $product)
    {

        if (!isset($product)) {

            return $this->error("Nothing Found");
        }
        return new ProductResource($product);
    }
}
