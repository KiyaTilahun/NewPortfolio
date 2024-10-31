<?php

namespace App\Http\Filter\V1;

class FooterFilter extends QueryFilter
{

    public function name($value)
    {
        $likeStr = str_replace('*', '%', $value);
        return $this->builder->where('name', 'like', $likeStr);
    }

    public function visible($categoryName)
    {
        // dd($categoryName);
        return $this->builder->where('is_visible', $categoryName);

    }
   

  
}
