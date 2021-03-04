@extends('layouts.layoutProyecto')
@section('content')
    <div class="container-fluid d-flex flex-column p-4">
        <!--FORM PARA SUBIR ARCHIVOS-->
        <form id="formMultimedia" action="{{route('multimedia.guardar',$proyecto->id)}}" method="post"
              enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="d-flex mb-3 flex-wrap">
                <div id="select-archivo" class="p-1 mr-3 mw-100">
                    <input type="file" name="archivo" id="archivo" class="mw-100 d-none d-sm-inline-block" required>
                    <input type="button" value="Seleccionar archivo"
                           class="d-inline-block d-sm-none" onclick="document.getElementById('archivo').click();" />
                    <span id="iconoArchivo" class="fa"></span>
                </div>

                <button type="submit" class="btn btn-dark" id="subirArchivo">
                    Subir arhivo
                </button>
            </div>
        </form>
        <!-- TABLA CON LOS ARCHIVOS -->
        <div>
            <p class="h3">Archivos de {{$proyecto->titulo}}</p>
            @if(count($listaArchivos)>0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Fecha de creación</th>
                            <th scope="col">¿Descargar?</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($listaArchivos as $archivo)
                            <tr>
                                <th scope="row">{{$archivo->nombre}}</th>
                                <td>{{$archivo->created_at}}</td>
                                <td>
                                    <a class="btn btn-dark" href="{{route('multimedia.descargar',$archivo->id)}}">
                                        Descargar
                                    </a>
                                </td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p>No se ha subido ningún archivo al proyecto</p>
            @endif
        </div>
    </div>

@endsection
