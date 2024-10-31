<?php

namespace App\Http\Filter\V1;

class SocialFilter extends QueryFilter
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
    public function defaultvalue()
    {
        // dd($categoryName);
        return $this->builder->where('is_visible',true);

    }

  
}
