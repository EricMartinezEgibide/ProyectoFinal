<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Multimedia;
use App\Models\Proyecto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MultimediaController extends Controller
{
    public function index(){

        //obtener datos del proyecto seleccionado mediante la cookie
        $proyecto = Proyecto::find($_COOKIE['idProyecto']);
        //obtener archivos del proyecto seleccionado
        $listaArchivos = Multimedia::orderBy('updated_at','DESC')->get()->where('proyecto_id',$proyecto->id);


        return view('archivos')->with('proyecto',$proyecto)->with('listaArchivos',$listaArchivos);

    }
    public function store($id){
        request()->validate(['archivo'=>'']);
        $nombre = request()->archivo->getClientOriginalName();
        $ruta= 'public/media/proyectos/'.$id.'/'.$nombre;
        //buscar si ya existe el archivo
        $archivo = Multimedia::get()->where('ruta',$ruta)->first();
        if($archivo==null){
            //guardar en servidor:
            request()->archivo->storeAs('public/media/proyectos/'.$id,$nombre);
            //guardar en BD:
            Multimedia::create([
                'nombre'=>$nombre,
                'ruta'=>$ruta,
                'usuario_id'=>Auth::user()->id,
                'proyecto_id'=>$id
            ]);

        }
        return $this->index();
    }
    public function descargar($id){
        $rutaArchivo = Multimedia::find($id)->ruta;
        return Storage::download($rutaArchivo);
    }
}
