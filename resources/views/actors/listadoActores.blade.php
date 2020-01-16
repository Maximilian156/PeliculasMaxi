@extends('layouts.app')
@section('content')
    <h2 class="text-center">Listado de Actores</h2>
    <div>
    <form action="/buscarActor" method="GET">
        <input type="submit" value="Buscar"><input type="text" name="busqueda">
        <a href="/agregarActor" class="btn btn-info">Agregar Actor</a>
    </form>
    </div>

    <div class="spacer">
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Ver</th>
        </tr>
        </thead>
        <tbody>

            @foreach ($actores as $key => $actor)
                <tr>
                <td>{{$actor->id}}</td>
                <td>{{$actor->first_name}}</td>
                <td><a href="/detalleActor/{{$actor->id}}"><ion-icon name="eye"></ion-icon></a></td>
                </tr>

            @endforeach
        <tr>

        </tr>
        </tbody>
    </table>
    </div>
    <div class="d-flex justify-content-center">
        {{$actores->links()}}
    </div>

@endsection