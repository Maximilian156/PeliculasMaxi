@extends('layouts.app')
@section('content')
<h2 class="text-center text-danger">Detalle de la Película</h2>
<div class="row mt-2">
    <div class="col-lg-4 offset-lg-4">
        <div class="card w-100">
            <div class="text-center mt-2">
                <img src="{{ asset('storage/poster-pelicula/'.$pelicula->poster) }}" class="card-img-top w-50" alt="...">
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Título: </b> {{$pelicula->title}}</li>
                    <li class="list-group-item"><b>Calificación: </b> {{$pelicula->rating}} </li>
                    <li class="list-group-item"><b>Premios: </b> {{$pelicula->awards}}</li>
                    <li class="list-group-item"><b>Fecha de creación: </b> {{$pelicula->release_date}}</li>
                    <li class="list-group-item"><b>Duracion: </b> {{$pelicula->length}}</li>
                    <li class="list-group-item"><b>Genero: </b> {{$pelicula->genero->name}}</li>
                </ul>
            </div>
        </div>
        <a href="/administrarPelicula" class="btn btn-danger">Volver</a>
    </div>

</div>

@endsection