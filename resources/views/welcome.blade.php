@extends('layouts.app')
@section('content')
<div class="container-fluid">

        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="img/banner1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="img/banner2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="img/banner3.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="img/banner4.jpg" class="d-block w-100" alt="...">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
          </a>
        </div>
      <hr>

      <main class="row m-0 justify-content-center">
        <h2 class="__peliculasdeldia">Películas en estreno</h2>
        <div class="__peliculas row m-0 col-12">
          @foreach($peliculas as $key => $pelicula)
            <div class="d-flex card col-12 col-md-4 col-lg-3 __itempelicula" style="width: 18rem;">
              <img src="/storage/poster-pelicula/{{$pelicula->poster}}" class="card-img-top __imgpelicula" alt="...">
              <div class="card-body">
                <p class="card-text __textopelicula">{{ $pelicula->title }}</p>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target=".bd-example-modal-lg-{{ $key }}">Ver detalle</button>
                <!-- Modal -->
                <div class="modal fade bd-example-modal-lg-{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title text-danger" id="myLargeModalLabel">{{ $pelicula->title }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="text-center mb-3">
                          <img src="{{ asset('storage/poster-pelicula/'.$pelicula->poster) }}" class="card-img-top w-25" alt="...">
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item "><b>Calificación: </b> {{$pelicula->rating}} </li>
                            <li class="list-group-item"><b>Premios: </b> {{$pelicula->awards}}</li>
                            <li class="list-group-item"><b>Fecha de creación: </b> {{$pelicula->release_date}}</li>
                            <li class="list-group-item"><b>Duracion: </b> {{$pelicula->length}}</li>
                            <li class="list-group-item"><b>Genero: </b> {{$pelicula->genero->name}}</li>
                        </ul>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-success">Comprar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <div class="">
          {{$peliculas->links()}}
        </div>
      </main>
      
    </div>

@endsection