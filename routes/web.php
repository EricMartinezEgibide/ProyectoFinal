<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
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


//RUTAS DE REGISTRO,LOGIN Y RESET

Auth::routes();

Route::get('/',"LoginView@index")->name('index');

Route::get('/pass/reset',function (){return view('auth.passwords.em');})->name('pass/resset');

Route::view("/layout", "layout");

//USUARIOS
Route::post("/editarUsuario", "UsuarioController@update")->name("editarUsuario");

//PROYECTOS
Route::get("/home", "ProyectoController@index")->name("home");
Route::post("/insertarProyecto", "ProyectoController@store")->name("insertarProyecto");
Route::get("/proyecto/{id}", "ProyectoController@show")->name("abrirProyecto");
Route::post('/crearCom','ProyectoController@crearComentario')->name('crearComentario');
Route::get('/tareas','TareasController@index')->name('mostrarTareas');
Route::post('/crearTareas','TareasController@store')->name('crearTareas');


//MENSAJES
Route::post('/crearCom','ProyectoController@crearComentario')->name('crearComentario');

//UsuariosProyectos
Route::get("/listaDeUsuarios", "usuariosProyectosController@index")->name("UsuariosProyectos");
Route::post("/AnadirUsuarioProyecto", "usuariosProyectosController@store")->name("AnadirUsuarioProyecto");


//ARCHIVOS
Route::get('/archivos','MultimediaController@index')->name('multimedia');
////subir archivos
Route::post('archivos/{proyecto}','MultimediaController@store')->name('multimedia.guardar');

////Descargar archivos
Route::get('/public/{archivo}', 'MultimediaController@descargar')->name('multimedia.descargar');

