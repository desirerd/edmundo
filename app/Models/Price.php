<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    // Elementos que quiero proteger de la asignación masiva;
    protected $guarded = ['id'];

    // Relación uno a muchos

    public function courses(){

        return $this->hasMany('App\Models\Course');
    }
}
