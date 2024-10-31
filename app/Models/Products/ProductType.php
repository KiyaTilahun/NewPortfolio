<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductType extends Pivot
{
    //

    protected $fillable = [
        'type_id',
        'product_id',
    ];
}
