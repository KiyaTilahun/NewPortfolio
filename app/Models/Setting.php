<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded=[];


    // relationships
    public function Settingcategory(){

        return $this->belongsTo(Settingcategory::class);

    }
    // protected $casts = [
    //     'option' => 'array', 
    // ];

    // public function getRouteKeyName()
    // {
    //     return 'name';
    // }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if ($model->type === 'Boolean') {
                $model->value = $model->value == 1 ? "True" : "False";
            }
        });
    }
}
