@extends('layouts.app')
@section('content')
    <h2 class="text-center">Agregar Película</h2>
    <div class="container-fluid">
        <div class="row mt-5">
        <div class="col-lg-8 offset-lg-2">
            @if (count($errors->all())>0)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}} </li>
                    @endforeach
                </ul>
            @endif

            <form action="/guardarPelicula" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nombrePelicula">Nombre</label>
                    <input type="text" class="form-control" name="title" id="nombrePelicula" value="{{ isset($errors->messages()['title'][0]) ? "" : old('title') }}">
                </div>
                <div class="form-group">
                    <label for="ratingPelicula">Rating</label>
                    <input type="number" class="form-control" name="rating" id="ratingPelicula" value="{{ isset($errors->messages()['rating'][0]) ? "" : old('rating') }}">
                </div>
                <div class="form-group">
                    <label for="awards">Awards</label>
                    <input type="number" class="form-control" name="awards" id="awards">
                </div>
                <div class="form-group">
                    <label for="release-date">Release Date</label>
                    <input type="date" class="form-control" name="release_date" id="release-date">
                </div>
                <div class="form-group">
                    <label for="duracionPelicula">Duración</label>
                    <input type="number" class="form-control" name="length" id="duracionPelicula">
                </div>
                <div class="form-group">
                    <label for="generos">Género de la Película</label>

                    <select class="form-control" name="genre_id" id="generos">
                        <option value="#" disabled>Seleccione Genero...</option>
                        @foreach ($generos as $genero)
                            <option value="{{$genero->id}}">{{$genero->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label for="">Poster Película</label>
                  <br>
                  <input type="file" name="poster">
                  <?php //1)Como mantener el archivo cuando hay errores en otros campos ?>
                </div>

                <button type="submit" class="btn btn-primary mb-3">Registrar Película</button>
            </form>

        </div>
    </div>
    </div>
@endsection
