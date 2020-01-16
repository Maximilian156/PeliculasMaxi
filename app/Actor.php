<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Movie;
//Dispara a donde situarse
class Actor extends Model
{
    protected $guarded = [];
    //Por si es necesario modificar una tabla
    public function peliculas(){
      return $this->belongsToMany(Movie::class,'actor_movie','actor_id','movie_id');
      //Relacion muchos a muchos,tabla pivot y tablas correspondientes
    }

    
}
