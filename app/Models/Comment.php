<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    // Elementos que quiero proteger de la asignación masiva;
    protected $guarded = ['id'];
    
    use HasFactory;

    public function commentable(){

        return $this->morphTo();
    }

    //Relación uno a muchos polimórfica

    public function comments(){

        return $this->morphMany('App\Models\Comment','commentable');
    }

    
    public function reactions(){

        return $this->morphMany('App\Models\Reaction','reactionable');
    }


   //Relación uno a muchos inversa

   public function user(){

    return $this->belongsTo('App\Models\User');
}

}
