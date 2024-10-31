<?php

namespace App\Http\Filter\V1;

class ProductFilter extends QueryFilter
{

    public function name($name)
    {
        // dd($typename);
        return $this->builder->where('name',$name);
    }

    public function type($typename)
    {
        // dd($typename);
        return $this->builder->whereHas('types', function ($query) use ($typename) {
            $query->whereIn('title', explode(',', $typename));
        });
    }
    public function available($availability)
    {
        // dd($availability);
        return $this->builder->where('is_available', $availability);

    } 
    

}
