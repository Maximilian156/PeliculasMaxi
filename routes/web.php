<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Ruta para la página principal
Route::get('/','HomeController@index');

//Esta ruta es creada automaticamente por laravel luego de hacer lo referido a la autenticación
//-------------
Auth::routes();
//-------------

Route::get('/home', 'HomeController@index')->name('home');

//Rutas para el  Administrador - Películas -

//Muestra todas las películas de nuestra Base de Datos
Route::get('/administrarPelicula','AdministrarPeliculasController@index')->name('administrarPelicula');

//Ruta para agregar Pelicula
Route::get('/agregarPelicula','AdministrarPeliculasController@create');
//Ruta para guardar pelicula
Route::post('/guardarPelicula','AdministrarPeliculasController@save');

//Ruta para ver el detalle de la Película
Route::get('/detallePelicula/{id}','AdministrarPeliculasController@show');

//Ruta para Editar Películas
Route::get('/editarPelicula/{id}','AdministrarPeliculasController@edit');
//Ruta para guardar los cambios método update
Route::put('/guardarPeliculaEditada/{id}', 'AdministrarPeliculasController@update');

//Ruta para buscar películas
Route::get('/buscarPelicula','AdministrarPeliculasController@search');

//Ruta para eliminar una película
Route::delete('eliminarPelicula','AdministrarPeliculasController@destroy');


//Actores (navbar)
Route::get('Actores', 'AdministrarActoresController@indexA')->name('actores');

//Muestra todas los actores de nuestra Base de Datos (Enrutamiento para mostrar tabla)
Route::get('/administrarActores','AdministrarActoresController@indexAA')->name('administrarActores');

//Ruta para agregar Actor
Route::get('/agregarActor','AdministrarActoresController@create');

//Ruta para guardar Actor
Route::post('/guardarActor','AdministrarActoresController@save');

//Ruta para ver el detalle del Actor
Route::get('/detalleActor/{id}','AdministrarActoresController@show');

//Ruta para buscar películas
Route::get('/buscarActor','AdministrarActoresController@search');


//Generos
Route::get('generos', 'AdministrarGenerosController@index')->name('generos');
