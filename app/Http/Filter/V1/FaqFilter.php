<?php

namespace App\Http\Filter\V1;

class FaqFilter extends QueryFilter
{


    public function active($status)
    {
        // dd($categoryName);
        return $this->builder->where('is_active', $status);

    }


  
}
