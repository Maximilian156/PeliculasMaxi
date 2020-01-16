<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Genre;

class AdministrarGenerosController extends Controller
{
    public function index(){
        $generos = Genre::paginate(10);
        return view('genres.genres')->with('generos',$generos);
    }

}
