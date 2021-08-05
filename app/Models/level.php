<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class level extends Model
{

    // Elementos que quiero proteger de la asignación masiva;
    protected $guarded = ['id'];
    
    use HasFactory;
}
