<?php

namespace App;
//Primeras lineas preconfiguradas
use Illuminate\Database\Eloquent\Model;

use App\Genre;
use App\Actor;
//Apunta a los modelos
class Movie extends Model
{
    protected $guarded = [];

    public function genero(){
      //return $this->belongsTo(Genre::class,'genre_id','id');
      return $this->belongsTo(Genre::class,'genre_id');//clase genero y apunta al gener_id del modelo o tabla movie

      //Otra forma: el nombre del método tiene que ser el mismo que el modelo para que funcione
      //public function genre(){
      //  return $this->belongsTo(Genre::class);
      //}
    }

    public function actores(){
      //return $this->belongsToMany(Actor::class);
      return $this->belongsToMany(Actor::class,'actor_movie','movie_id','actor_id'); 
    }
}
