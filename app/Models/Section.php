<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    // Elementos que quiero proteger de la asignación masiva;
    protected $guarded = ['id'];

     // Relación uno a muchos inversa

     public function course(){

        return $this->belongsTo('App\Models\Course');
    }


    // Relación uno a muchos

    public function lessons(){

        return $this->hasMany('App\Models\Lesson');
    }
}
