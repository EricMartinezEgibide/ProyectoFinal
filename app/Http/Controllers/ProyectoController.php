<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mensaje;
use App\Models\Proyecto;

use App\Models\User;
use App\Models\usuarios_proyectos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Auth::user();

        if($usuario == null){
            return redirect("/");
        }


        $peticionesPendientes = usuarios_proyectos::get()->where("usuario_id", $usuario->id)->where("estado", "0");
        $listaPeticiones = array();

        foreach ($peticionesPendientes as $peticion){
            array_push($listaPeticiones, Proyecto::get()->where("id", $peticion->proyecto_id)->first());
        }

        $usuariosProyectos = usuarios_proyectos::get()->where("usuario_id", $usuario->id)->where("estado", "1");
        $listaProyectos = array();


        foreach ($usuariosProyectos as $usuarioProyecto){
            array_push($listaProyectos, Proyecto::get()->where("id", $usuarioProyecto->proyecto_id)->first());
        }


        //"usuario" => $usuario
        return view("home", ["listaProyectos" => $listaProyectos, "x" => 1, "z" => 1, "peticionesPendientes" => $listaPeticiones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        $usuario = Auth::user();

        $proyecto = new Proyecto([
            "titulo" => request("titulo"),
            "descripcion" => request("descripcion"),
            "usuario_id" => $usuario["id"]
        ]);

        $proyecto->save();

        $proyectoCreado = Proyecto::get()->where('titulo',request('titulo'))->where('usuario_id',$usuario["id"])->first();

        usuarios_proyectos::Create([
            'usuario_id'=>Auth::user()->id,
            'proyecto_id'=>$proyectoCreado->id,
            'estado' => 1,
        ]);


        return redirect()->route("home");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {   $idUsuario = Auth::user()->id;


        $proyecto = Proyecto::get()->where("id", $id)->first();
        setcookie("idProyecto",$id,time()+31556926 ,'/');

        $mensajes = Mensaje::get()->where('proyecto_id',$proyecto->id);
        $autorProyecto = User::get()->where("id", $proyecto->usuario_id)->first();

      foreach ($mensajes as $mensaje){


            $autor = User::get()->where('id',$mensaje->usuario_id)->first();

            $datosAutor = [
                "name" => $autor->name,
                "id" => $autor->id,
                "apellidos" => $autor->apellidos
            ];
            $mensaje->datosAutor = $datosAutor;

        }

        return view('proyecto')->with('proyecto',$proyecto)->with('mensajes',$mensajes)->with('aut',$autorProyecto);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function crearComentario(){
        $id = Auth::user()->id;
        $idp = request('idP');

        Mensaje::Create([
            'texto'=>request('mensaje'),
            'usuario_id'=>$id,
            'proyecto_id'=>$idp
        ]);


      return back();

    }


    public function aceptarProyecto(){
        DB::table("usuarios_proyectos")->where("usuario_id", Auth::user()->id)->where("proyecto_id", request("idProyecto"))->update([
            "estado" => 1
        ]);

        return redirect()->route("home");
    }

    public function rechazarProyecto(){
        DB::table("usuarios_proyectos")->where("usuario_id", Auth::user()->id)->where("proyecto_id", request("idProyecto"))->delete();

        return redirect()->route("home");
    }
}
