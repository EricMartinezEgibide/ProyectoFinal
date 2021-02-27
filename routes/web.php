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

Route::get('/',"LoginView@index")->name('index');


Route::get('/pass/reset',function (){return view('auth.passwords.em');})->name('pass/resset');


//RUTAS DE REGISTRO,LOGIN Y RESET

Auth::routes();

Route::view("/layout", "layout");

//USUARIOS
Route::post("/editarUsuario", "UsuarioController@update")->name("editarUsuario");

//PROYECTOS
Route::get("/home", "ProyectoController@index")->name("home");
Route::post("/insertarProyecto", "ProyectoController@store")->name("insertarProyecto");
Route::post("/proyecto", "ProyectoController@show")->name("abrirProyecto");

//MENSAJES
Route::post('/proyecto/mensaje','ProyectoController@show')->name('cr');

//ARCHIVOS
Route::get('/archivos',function (){
    return view('archivos');
})->name('multimedia');

Route::post('multimedia',function (){
    request()->validate(['file'=>'']);
    return request()->archivo->storeAs('public',request()->archivo->getClientOriginalName());
})->name('multimedia.guardar');
