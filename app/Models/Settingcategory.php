<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Settingcategory extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $guarded=[];

    public function Settings(){

        return $this->hasMany(Setting::class);

    }
    // to display the option from the database to the form
  

}
