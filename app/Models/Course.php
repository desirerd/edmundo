<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // Elementos que quiero proteger de la asignación masiva;
    protected $guarded = ['id','status'];
    
    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;

    // Relación uno a muchos , Recuperar las reviews de ese usuario

    public function reviews(){

        return $this->hasMany('App\Models\Review');
    }

    public function requirements(){

        return $this->hasMany('App\Models\Requirement');
    }

    public function goals(){

        return $this->hasMany('App\Models\Goal');
    }

    public function audiences(){

        return $this->hasMany('App\Models\Audience');
    }

    public function sections(){

        return $this->hasMany('App\Models\Section');
    }


    // Relación uno a muchos inversa
    // Recuperar el usuario que ha dictado el curso
    // Especificamos que la llave foránea se llama user_id, porque sino, por defecto,
    // buscará en un campo llamado teacher_id, ya que el método se llama teacher.
    
    public function teacher(){

        return $this->belongsTo('App\Models\User','user_id');

    }

    public function level(){

        return $this->belongsTo('App\Models\level');
    }

    public function category(){

        return $this->belongsTo('App\Models\Category');
    }

    public function price(){

        return $this->belongsTo('App\Models\Price');
    }

  // Relación muchos a muchos 
  // Recuperar los estudiantes del curso

  public function students(){

    return $this->belongsToMany('App\Models\User');

}

// Relación uno a uno polimórfica

public function image(){

    return $this->morphOne('App\Models\Image','imageable');

}

public function lessons(){

    //Le paso el modelo Lesson y el modelo de la tabla intermedia de donde hago la conexión.

    return $this->hasManyThrough('App\Models\Lesson','App\Models\Section');

}
}
