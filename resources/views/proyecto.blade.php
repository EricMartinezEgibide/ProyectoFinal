@extends('layouts.layoutProyecto')




@section('content')


   <div id="descripcion" class=" p-2  order-0  flow-md-grow-5  order-md-1 bg-secondary  border d-flex  flex-column rounded order-0 order-md-1 align-items-center">


        <h1 class="mb-3 text-light">{{$proyecto->titulo}}</h1>
        <span id="titulospan" class="mb-3 text-light text-uppercase">informacion del proyecto</span>

        <button type="button" class="btn text-uppercase btnEnviar btn-success" data-toggle="modal" data-target="#exampleModal">
            Informacion
        </button>

       @if($proyecto->usuario_id==auth()->user()->id)
           <button type="button" class=" mt-3 btn text-uppercase btnEnviar btn-danger" onclick="location.href='/proyecto/eliminar/{{$proyecto->id}}'">
               Eliminar
           </button>
       @endif





        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Informacion proyecto</h5>
                    </div>
                    <div class="modal-body">
                            <div class="sn-field ">
                                <span class="text-break">Descripcion: {{$proyecto->descripcion}}</span>
                                <p></p>
                                <span class="text-break">Fecha de creacion: {{$proyecto->created_at}}</span>
                                <p></p>
                                <span>Autor: {{$aut->name}}</span>
                                <p></p>


                            </div>
                            <div class="modal-footer">
                                <button type="button"  class="btn btn-secondary text-uppercase " data-dismiss="modal">cerrar</button>
                            </div>
                    </div>

                </div>
            </div>
        </div>


    </div>


    <div id='over' class="bg-dark order-1 order-md-0 p-2 border border-4 rounded    d-flex flex-column   ">

        <div id="over2" class="d-flex flex-column bg-light align-items-start justify-content-end p-2 overflow-auto border">

            @forelse($mensajes as $mensaje)
                @if($mensaje->datosAutor['name']==auth()->user()->name)

                <div class="divMensaje mensajeEnviado divMensaje d-flex flex-column align-items-start justify-content-center align-self-end">
                    <p class="autor">{{$mensaje->datosAutor['name']}} </p>
                    <div id="mensaje" class="w-100 d-flex align-self-end justify-content-between">
                        <label class="">{{$mensaje->texto}}</label>
                        <label class="fecha ml-5">{{$mensaje->created_at}}</label>
                    </div>
                </div>
                @else
                    <div class="divMensaje mensajeRecibido divMensaje d-flex flex-column align-items-start justify-content-center align-self-start">
                        <p class="autor">{{$mensaje->datosAutor['name']}} </p>
                        <div id="mensaje" class="w-100 d-flex align-self-end justify-content-between">
                            <label class="">{{$mensaje->texto}}</label>
                            <label class="fecha ml-5">{{$mensaje->created_at}}</label>
                        </div>
                    </div>

                @endif

            @empty
            @endforelse


        </div>

        <div class=" bg-secondary rounded   order-2 border">


            <form    method="post" action="{{route('crearComentario')}}" onsubmit="return validarComentario()">
                @csrf
                <div class="divIntroducirTexto d-flex justify-content-center align-items-center h-100">
                    <input type="hidden" value="{{$proyecto->id}}" name="idP">
                    <textarea id="textarea" name="mensaje" placeholder="Escribe tu mensaje"class="zonaMensaje overflow-hidden"></textarea>
                    <button  id="btn" class="btnEnviar btn-secondary">Enviar</button>
                </div>

            </form>
        </div>

    </div>



@endsection
