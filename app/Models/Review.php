<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // Elementos que quiero proteger de la asignación masiva;
    protected $guarded = ['id'];
    

    // Relación uno a muchos inversa

    // Recuperar las reviews de ese usuario

    public function user(){

        return $this->belongsto('App\Models\USer');
    }

    public function course(){

        return $this->belongsto('App\Models\Course');
    }

}
