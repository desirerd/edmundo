<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;

    // Elementos que quiero proteger de la asignación masiva;
    protected $guarded = ['id'];

    // Una plataforma puede tener varias lecciones.
    // Una lección solo puede pertenecer a una plataforma
    // Uno a muchos
    
    public function lessons(){

        return $this->hasMany('App\Models\Lesson');
    }
}
