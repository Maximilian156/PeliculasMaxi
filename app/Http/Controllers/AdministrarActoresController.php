<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Actor;

use App\Movie;

class AdministrarActoresController extends Controller
{
    public function indexA(){
        $actores = Actor::paginate(10);
        $peliculas = Movie::all();
        return view('actors.actors')->with('actores',$actores)->with('peliculas',$peliculas);
    }

    public function indexAA(){
        $actores = Actor::paginate(10);
        return view('actors.listadoActores')->with('actores',$actores);
    }

    public function create(){
        $peliculas = Movie::all();
        return view('actors.agregarActor')->with('peliculas', $peliculas);
    }

    public function save(Request $request){
        $reglas = [
            'first_name'=>'required|string|max:30',
            'last_name'=>'required|string|max:30',
            'rating'=>'required|numeric|min:1|max:10',
        ];
        $this->validate($request,$reglas);

        $actor = new Actor();
        $actor->first_name = $request->input('first_name');
        $actor->last_name = $request->input('last_name');
        $actor->rating = $request->input('rating');
        $actor->favorite_movie_id = $request->input('favorite_movie_id');
        $actor->save();

        return redirect('/administrarActores');
    }
    public function show($id){
        $actor = Actor::find($id);
        $peliculas = Movie::all();
        return view('actors.detalleActor')->with('peliculas', $peliculas)->with('actor',$actor);
    } 

    public function search(Request $request){
        $actores = Actor::where('first_name','like','%'.$request->input('busqueda').'%')->paginate(10);
        return view('actors.listadoActores')->with('actores',$actores);
    }
}
