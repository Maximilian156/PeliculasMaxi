@extends('layouts.app')
@section('content')
    <h2 class="text-center">Tabla de Películas</h2>
    <div>
    <form action="/buscarPelicula" method="GET">
        <input type="submit" value="Buscar"><input type="text" name="busqueda">
        <a href="/agregarPelicula" class="btn btn-info">Agregar Pelicula</a>
    </form>
    </div>

    <div class="spacer">
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Ver</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
        </thead>
        <tbody>

            @foreach ($peliculas as $key => $value)
                <tr>
                <td>{{$value->id}}</td>
                <td>{{$value->title}}</td>
                <td><a href="/detallePelicula/{{$value->id}}"><ion-icon name="eye"></ion-icon></a></td>
                <td><a href="/editarPelicula/{{$value->id}}"><ion-icon name="create"></ion-icon></a></td>
                <?php // <td><a href="/eliminarPelicula/{{$value->id}}"><ion-icon name="trash"></ion-icon></a></td> ?>
                <td>
                  <form action="/eliminarPelicula" method="POST">
                    {{ method_field('DELETE') }}
                    @csrf <?php //Se puede usar también: {{ csrf_field() }} ?>
                    <input type="hidden" name="id" value="{{$value->id}}">
                    <button type="submit" class="text-primary border-0"><ion-icon name="trash"></ion-icon></button>
                  </form>
                </td>
                </tr>

            @endforeach
        <tr>

        </tr>
        </tbody>
    </table>
    </div>
    <div class="d-flex justify-content-center">
        {{$peliculas->links()}}
    </div>

@endsection