<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

  // Elementos que quiero proteger de la asignación masiva;
  protected $guarded = ['id'];

  
    use HasFactory;

      // Relación uno a muchos

      public function courses(){

        return $this->hasMany('App\Models\Course');
    }

}
