<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscriber extends Model
{
    use HasFactory,SoftDeletes;


protected $guarded=[];
    // protected $casts = [
    //     'status' => 'boolean',
    // ];

    // public function getStatusAttribute($value)
    // {
    //     return $value ? 'active' : 'inactive';
    // }
}
