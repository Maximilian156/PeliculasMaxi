<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Actor;
use App\Genre;
use App\Movie;

class AdministrarPeliculasController extends Controller
{
    //Método creado para mostrar todos las películas de mi tabla movies
    public function index(){
        $peliculas = Movie::paginate(10);
        return view('movies.listadoPeliculas')->with('peliculas', $peliculas);
    }

    //Método para invocar al formulario de Agregar Película, el mismo viaja por el método get
    public function create(){
        $generos = Genre::all();
        return view('movies.agregarPelicula')->with('generos', $generos);
    }

    //Método para guardar la película
    public function save(Request $request){
        $reglas = [
            'title'=> 'required',
            'rating' => 'required|numeric',
            'awards' => 'required|numeric',
            'release_date' => 'date',
            'length' => 'required|numeric',
            'poster' => 'required|mimes:jpeg,bmp,png'
            //por como está armado el formulario, no hace falta validar el género
        ];

        $mensajes = [
            'title.required' => 'Este campo :attribute es requerido...',
            'required' => 'Este campo :attribute es requerido...',
            'numeric' => 'Ingrese en este campo :attribute sólo números...',
            'date' => 'Debe indicar una fecha...',
            'poster.required' => 'Debe subir una imagen...',
            'poster.mimes' => 'El archivo debe ser formato jpeg,jpg,bmp o png' //jpg parece incluido en jpeg, y cuando el nombre de la imagen se guarda en la base de datos, se almacena con extensión jpeg en lugar de jpg
        ];

        $this->validate($request,$reglas,$mensajes);

        //Si los datos son correctos
        $pelicula = new Movie();
        //dd($request->all()); array con todos los inputs, donde el name es la posicion y el value el valor
        //dd($request->input('title')); obtengo el value del input
        $ruta = $request->file('poster')->storePublicly('public/poster-pelicula'); //Si no existe la carpeta poster, la crea
        //dd($ruta);
        $nombrePoster = basename($ruta);
        $pelicula->title = $request->input('title');
        $pelicula->rating = $request->input('rating');
        $pelicula->awards = $request->input('awards');
        $pelicula->release_date = $request->input('release_date');
        $pelicula->length = $request->input('length');
        $pelicula->genre_id = $request->input('genre_id');
        $pelicula->poster = $nombrePoster;

        $pelicula->save();
        return  redirect('/administrarPelicula');
    }

    //Función que busca el detalle de un registro en la Base de Datos
    public function show($id){
        $pelicula = Movie::find($id);
        //dd($pelicula->genero->name);
        return view('movies.detallePelicula')->with('pelicula', $pelicula);
    }

    //Método para el buscador
    public function search(Request $request){
        //dd($request);
        $buscar = $request->busqueda;
        //dd($buscar);
        $peliculas = Movie::where('title','like','%'.$buscar.'%')->paginate(10);
        return view('movies.listadoPeliculas')->with('peliculas',$peliculas);
    }

    public function delete($id){
      $pelicula = Movie::find($id);
      $pelicula->delete();
      return redirect('administrarPelicula');
    }
    
    //Primero creo el método para mostrar mi formulario de Películas, teniendo en cuenta que también debo pasarle el genero que ya posee
	public function edit($id)
	{
		// Busco la Pelicula que seleccionó el usuario de la lista
		$peliculaEditar = Movie::find($id);

        // Busco los géneros
        //-----------------
        //Si los quisiera enviar a la vista de una vez ordenados,puedo hacer
        //$genres = Genre::orderBy('name')->get();
        //-----------------
        $generos = Genre::all();
        //dd($genres);

        $generoEditado = Genre::find($peliculaEditar->genre_id);

        return view('movies.editarPelicula')->with('peliculaEditar', $peliculaEditar)->with('generos', $generos)->with('generoEditado', $generoEditado);
	}

    public function update(Request $request, $id){
        $reglas = [
            'title'=> 'required',
            'rating' => 'required|numeric',
            'awards' => 'required|numeric',
            'release_date' => 'date',
            'length' => 'required|numeric'
            //por como está armado el formulario, no hace falta validar el género
        ];

        $mensajes = [
            'title.required' => 'Este campo :attribute es requerido...',
            'required' => 'Este campo :attribute es requerido...',
            'numeric' => 'Ingrese en este campo :attribute sólo números...',
            'date' => 'Debe indicar una fecha...'
        ];

        if($request->file('poster')!=null){
            $reglas['poster'] = 'mimes:jpeg,bmp,png';
            $mensajes['poster.mimes'] = 'El archivo debe ser formato jpeg,jpg,bmp o png';
            //jpg parece incluido en jpeg, y cuando el nombre de la imagen se guarda en la base de datos, se almacena con extensión jpeg en lugar de jpg
        }

        $this->validate($request,$reglas,$mensajes);

        //Si los datos son correctos
		$peliculaEditar = Movie::find($id);

        if($request->file('poster')!=null){
        $ruta = $request->file('poster')->storePublicly('public/poster-pelicula');
        $nombrePoster = basename($ruta);
        $peliculaEditar->poster = $nombrePoster;
        }

        $peliculaEditar->title = $request->input('title');
        $peliculaEditar->rating = $request->input('rating');
        $peliculaEditar->awards = $request->input('awards');
        $peliculaEditar->release_date = $request->input('release_date');
        $peliculaEditar->length = $request->input('length');
        $peliculaEditar->genre_id = $request->input('genre_id');
        //dd($peliculaEditar);

        //Si quiero actualizar, en lugar de save() es mejor usar update()
        //a diferencia de save, update hace cambios en los campos que no encuentra errores, pero los que tienen errores no modifica nada. Save si encuentra un error, no hace ningun cambio, en ningun campo
        $peliculaEditar->save();//Update es mejor que save cuando se quiere cambiar la contraseña

        // Redireccionamos a una RUTA
        return redirect('administrarPelicula');
	}

    //Eliminar película usando método http "delete"
    public function destroy(Request $request){
        $id = $request->input('id');
        $pelicula = Movie::find($id);
        $pelicula->delete();
        return redirect('administrarPelicula');
    }
}