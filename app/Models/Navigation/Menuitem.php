<?php

namespace App\Models\Navigation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menuitem extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $guarded=[];


    protected $casts = [
        'settings' => 'json', 
        'submenus' => 'json', 


    ];

    protected static function booted()
    {
        static::creating(function ($navigation) {
            $navigation->order = static::where('menu_id', $navigation->menu_id)
                                      ->max('order') + 1;
        });
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
    
    public function Menu(){

        return $this->belongsTo(Menu::class);

    }
}
