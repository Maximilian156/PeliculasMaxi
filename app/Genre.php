<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Movie;

class Genre extends Model
{
    protected $guarded = [];

    public function peliculas(){
      return $this->hasMany(Movie::class,'genre_id');
    }
}
