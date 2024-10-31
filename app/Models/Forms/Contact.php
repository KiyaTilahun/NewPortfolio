<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded=[];


 public function getFullnameAttribute()
{
    if (!empty($this->first_name) && !empty($this->last_name)) {
        return trim($this->first_name . ' ' . $this->last_name);
    }
    
    if (!empty($this->first_name)) {
        return $this->first_name;
    }

    if (!empty($this->last_name)) {
        return $this->last_name;
    }

    return '';
}
}
