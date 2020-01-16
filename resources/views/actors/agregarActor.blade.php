@extends('layouts.app')
@section('content')
    <h2 class="text-center">Agregar Actor</h2>
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

            <form action="/guardarActor" method="POST">
                @csrf
                <div class="form-group">
                    <label for="first_name">Nombre</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" value="{{ isset($errors->messages()['first_name'][0]) ? "" : old('first_name') }}">
                </div>
                <div class="form-group">
                    <label for="last_name">Apellido</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" value="{{ isset($errors->messages()['rating'][0]) ? "" : old('last_name') }}">
                </div>
                <div class="form-group">
                    <label for="rating">Rating</label>
                    <input type="number" class="form-control" name="rating" id="rating" max='10' min='1'>
                </div>
                <div class="form-group">
                    <label for="favorite_movie_id">Película Favorita</label>

                    <select class="form-control" name="favorite_movie_id" id="favorite_movie_id">
                        <option value="#" disabled>Seleccione Pelicula...</option>
                        @foreach ($peliculas as $pelicula)
                            <option value="{{$pelicula->id}}">{{$pelicula->title}}</option>
                        @endforeach
                    </select>
                </div>
            

                <button type="submit" class="btn btn-primary mb-3">Registrar Actor</button>
            </form>

        </div>
    </div>
    </div>
@endsection
