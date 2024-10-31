<?php

namespace App\Http\Filter\V1;

use Carbon\Carbon;

class PostFilter extends QueryFilter
{
protected $sortable=['title','created_at'];
    public function title($value)
    {
        $likeStr = str_replace('*', '%', $value);
        return $this->builder->where('title', 'like', $likeStr);
    }

    public function category($categoryName)
    {
        // dd($categoryName);
        return $this->builder->whereHas('categories', function ($query) use ($categoryName) {
            $query->whereIn('slug', explode(',', $categoryName));
        });
    }

    public function created_at($createdat){
        return $this->builder->where('created_at', '>=', $createdat);

    }
    public function filtertimeby($letter){

        $letter=strtoupper($letter);
        if ($letter === "W") {
            $today = now();
            $startOfWeek = now()->startOfWeek(Carbon::MONDAY);
            return $this->builder->whereBetween('created_at', [$startOfWeek, $today]);
        }
        else if ($letter === "M") {
            $startOfMonth = now()->startOfMonth();
            $endOfMonth = now()->endOfMonth();
        
            return $this->builder->whereBetween('created_at', [$startOfMonth, $endOfMonth]);
        }
        else if ($letter === "Y") {
            $startOfYear = now()->startOfYear();
            $endOfYear = now()->endOfYear();
        
            return $this->builder->whereBetween('created_at', [$startOfYear, $endOfYear]);
        }
    
        return $this->builder;

       
    }
     
    public function sort($sortvalues)
    {
        $valuesort = explode(',', $sortvalues);
        foreach ($valuesort as $value) {
            $direction = 'asc';
            if (strpos($value, '-') === 0) {

                $direction = 'desc';
                $value = substr($value, 1);
            }

            if(!in_array($value,$this->sortable)){

                continue;
            }
            $this->builder->orderBy($value, $direction);
        }
    }
}
