<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tarea;
use App\Models\Proyecto;
use App\Models\Tareas_usuarios;
use App\Models\User;
use App\Models\usuarios_proyectos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TareasController extends Controller
{
    //
    public function index()

    {


        $listaTareas = Tarea::where('proyecto_id',$_COOKIE['idProyecto'])->orderBy('id','desc')->paginate(5);

        foreach ($listaTareas as $tarea){


            $autor = User::get()->where('id',$tarea->usuario_id)->first();

            $datosAutor = [
                "name" => $autor->name,
                "id" => $autor->id,
                "apellidos" => $autor->apellidos
            ];
            $tarea->datosAutor = $datosAutor;

            $participantes = Tareas_usuarios::get()->where('tarea_id',$tarea->id);


           $listapart = [];
            foreach($participantes as $participante){

                $p = User::get()->where('id',$participante-> usuario_id)->first();
                array_push($listapart,$p);

            }

            $tarea->participantes=$listapart;



        }

        $participantesProyecto = usuarios_proyectos::get()->where('proyecto_id',$_COOKIE['idProyecto']);

        foreach ($participantesProyecto as $p)
        {
            $user = User::get()->where('id',$p->usuario_id)->first();



            $datosParticipante=[
              'id'=> $user->id,
              'name'=>$user->name
            ];
            $p->dt=$datosParticipante;

        }





        return view('tareas')->with('listatareas',$listaTareas)->with('participantesProyecto',$participantesProyecto);
    }


    public function store()
    {
        \request()->validate([
           'titulo'=>'required',
            'descripcion'=>'required',

        ]);


        Tarea::Create([
            'titulo'=>request('titulo'),
            'descripcion'=>request('descripcion'),
            'proyecto_id'=>\request('idP'),
            'usuario_id'=> Auth::user()->id,
            'fecha_vencimiento'=>null,
            'estado'=>false

        ]);

        $tarea = Tarea::get()->where('titulo',\request('titulo'))->where('usuario_id',Auth::user()->id)->first();


        Tareas_usuarios::Create([
            'usuario_id'=>Auth::user()->id,
            'tarea_id'=>$tarea->id,
            'estado'=>false
        ]);

        return redirect()->route('mostrarTareas');
    }

    public function addPtarea(){


        return request();

        $user = User::get()->where('email',request('email'))->first();

        if (!empty($user)){
            $comprobacion  = Tareas_usuarios::get()->where('tarea_id',request('idT'))->where('usuario_id',$user->id)->first();

            if (empty($comprobacion)){
                Tareas_usuarios::Create([
                    'usuario_id'=>$user->id,
                    'tarea_id'=>\request('idT'),
                    'estado'=>0
                ]);

            }else{
                return redirect()->route('mostrarTareas');
            }
        }
        return redirect()->route('mostrarTareas');


    }

    public function ajax(){



            $comprobacion  = Tareas_usuarios::get()->where('tarea_id',request('idT'))->where('usuario_id',\request('id'))->first();

            if (empty($comprobacion)){
                Tareas_usuarios::Create([
                    'usuario_id'=>\request('id'),
                    'tarea_id'=>\request('idT'),
                    'estado'=>0
                ]);
                return 1;

            }else{
                return 0;
            }


}

    public function endTarea()
    {

        $tarea = Tarea::get()->where('id',\request('idT'))->first();


        $tarea->estado = true;
        $tarea->fecha_vencimiento=date( "Y-m-d H:i:s");

        $tarea->save();

        return redirect()->back();

    }
}
