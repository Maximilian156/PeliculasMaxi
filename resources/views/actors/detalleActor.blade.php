@extends('layouts.app')
@section('content')
<h2 class="text-center text-danger">Detalles del Actor</h2>
<div class="row mt-2">
    <div class="col-lg-4 offset-lg-4">
        <div class="card w-100">
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Nombre: </b> {{$actor->first_name}}</li>
                    <li class="list-group-item"><b>Apellido: </b> {{$actor->last_name}}</li>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item "><b>Rating: </b> {{ $actor->rating }} </li>
                        @foreach ($peliculas as $key => $pelicula)
                          @if ($pelicula->id == $actor->favorite_movie_id)
                            <li class="list-group-item "><b>Película Favorita: </b> {{ $pelicula->title }} </li>
                          @endif
                        @endforeach
                        <li class="list-group-item "><b>Trabajos:</b>
                          <ul>
                            @foreach ($actor->peliculas as $key => $pelicula)
                              <li>{{ $pelicula->title }}</li>
                            @endforeach
                          </ul>
                        </li>
                    </ul>
                </ul>
            </div>
        </div>
        <a href="/administrarActores" class="btn btn-danger my-2">Volver</a>
    </div>

</div>

@endsection