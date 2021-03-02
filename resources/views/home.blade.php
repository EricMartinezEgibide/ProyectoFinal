@extends('layouts.layout')

@section("titulo", "Inicio")

@section('content')

    <div class="container-fluid d-flex flex-column">

        <br>

        <div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#CrearProyecto">
                Crear un nuevo proyecto
            </button>

            <!-- Modal -->
            <div class="modal fade" id="CrearProyecto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Crear proyecto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>


                        <form id="formProyecto" method="post" action="{{route("insertarProyecto")}}">
                            @csrf
                            <div class="modal-body">
                                <!--FORMULARIO PARA LA CREACIÓN DE PROYECTOS-->
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Título del proyecto</label>
                                        <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Mi proyecto">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Descripción</label>
                                        <textarea name="descripcion" class="form-control" id="descripcion" rows="3"></textarea>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <input type="submit" class="btn btn-dark" value="Crear">
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>

        <br>

        <!-- TABLA CON LOS PROYECTOS -->
        <div>
            <p class="h3">Lista de proyectos</p>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Título</th>
                    <th scope="col">Fecha de creación</th>
                    <th scope="col">¿Continuar?</th>
                </tr>
                </thead>
                <tbody>

                @forelse($listaProyectos as $proyecto)

                    <form method="get" action="{{route('abrirProyecto',$proyecto->id)}}">
                        @csrf
                        <tr>
                            <input type="hidden" name="id" value="{{$proyecto->id}}">
                            <th scope="row">{{$x++}}</th>
                            <td>{{$proyecto->titulo}}</td>
                            <td>{{$proyecto->created_at}}</td>
                            <td><input type="submit" class="btn btn-dark" value="Acceder"></td>
                        </tr>
                    </form>

                @empty
                    <tr>
                        <input type="hidden" name="id" value="">
                        <th scope="row">{{$x++}}</th>
                        <td>SIN NOTIFICACIONES</td>
                        <td></td>
                        <td></td>
                    </tr>


                @endforelse

                </tbody>
            </table>
        </div>

        <!-- TABLA CON LAS SOLICITUDES PENDIENTES -->
        <div>
            <p class="h3">Solicitudes pedientes</p>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Título</th>
                    <th scope="col">Aceptar</th>
                    <th scope="col">Denegar</th>
                </tr>
                </thead>
                <tbody>

                @forelse($peticionesPendientes as $proyecto)


                        <tr>
                            <input type="hidden" name="id" value="{{$proyecto->id}}">
                            <th scope="row">{{$z++}}</th>
                            <td>{{$proyecto->titulo}}</td>

                            <form method="post" action="{{route("aceptarProyecto")}}">
                                @csrf
                                <input type="hidden" name="idProyecto" value="{{$proyecto->id}}">
                                <td><input type="submit" class="btn btn-success" value="Aceptar"></td>
                            </form>

                            <form method="post" action="{{route("rechazarProyecto")}}">
                                @csrf
                                <input type="hidden" name="idProyecto" value="{{$proyecto->id}}">
                                <td><input type="submit" class="btn btn-danger" value="Rechazar"></td>
                            </form>
                        </tr>

                @empty
                    <tr>
                        <input type="hidden" name="id" value="">
                        <th scope="row">{{$z++}}</th>
                        <td>SIN NOTIFICACIONES</td>
                        <td></td>
                        <td></td>
                    </tr>


                @endforelse

                </tbody>
            </table>
        </div>


    </div>

@endsection
