<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Proyecto;
use App\Models\User;
use App\Models\usuarios_proyectos;
use Illuminate\Http\Request;

class UsuariosProyectosController extends Controller
{

    public function index()
    {
        $usuariosProyectos = usuarios_proyectos::get()->where("proyecto_id", $_COOKIE["idProyecto"])->where("estado", 1);

        //Para acceder al propietario
        $proyecto = Proyecto::get()->where("id", $_COOKIE["idProyecto"])->first();
        $propietario = User::get()->where("id", $proyecto->usuario_id)->first();

        $listaUsuarios = array();

        foreach ($usuariosProyectos as $usuarioProyecto){
            array_push($listaUsuarios, User::get()->where("id", $usuarioProyecto->usuario_id)->first());
        }

        return view("usuariosProyectos", ["listaUsuarios" => $listaUsuarios, "x" => 1, "propietario" => $propietario]);
    }

    public function create()
    {
        //
    }

    public function store()
    {


    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy()
    {
        usuarios_proyectos::where([
            ['usuario_id', '=', request("idUsuario")],
            ['proyecto_id', '=', $_COOKIE["idProyecto"]]
        ])->delete();

        return redirect()->route("UsuariosProyectos");

    }

    public function comprobarEmail(){
        $usuario = User::get()->where("email", request("email"))->first();

        if($usuario == null){
            return "0";
        }else{

            $usuario = User::get()->where("email", request("email"))->first();

            $usuarioProyecto = new usuarios_proyectos([
                "usuario_id" => $usuario->id,
                "proyecto_id" => $_COOKIE["idProyecto"],
                "estado" => 0
            ]);

            $usuarioProyecto->save();

            return "1";
        }



    }
}
