@extends('layouts.app')

@section('content')

<main class="row m-0 justify-content-center">
        <h2 class="__peliculasdeldia">Lista de Generos</h2>
        <div class="__peliculas row m-0 col-12">
          @foreach($generos as $key => $genero)
            <div class="d-flex card col-12 col-md-4 col-lg-3 __itempelicula" style="width: 18rem;">
              <div class="card-body">
                <p class="card-text __textopelicula">{{ $genero->name}}</p>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target=".bd-example-modal-lg-{{ $key }}">Ver detalle</button>
                <!-- Modal -->
                <div class="modal fade bd-example-modal-lg-{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title text-danger" id="myLargeModalLabel">{{ $genero->name}}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item "><b>Ranking: </b> {{$genero->ranking}} </li>
                            <li class="list-group-item "><b>Peliculas: </b>
                            <ul>
                            @foreach($genero->peliculas as $key=>$pelicula)
                            <li>{{$pelicula->title}}</li>
                            @endforeach
                            </ul>
                            </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <div class="">
          {{$generos->links()}}
        </div>
      </main>
@endsection