<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{

    // Elementos que quiero proteger de la asignación masiva;
    protected $guarded = ['id'];
    
    use HasFactory;

     // Relación uno a muchos inversa

     public function course(){

        return $this->belongsTo('App\Models\Course');
    }
}
