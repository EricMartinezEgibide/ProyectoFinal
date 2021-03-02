@extends('layouts.layoutProyecto')

@section('content')

    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>

    <!-- TABLA CON TODOS LOS USUARIOS -->
    <div class="d-flex flex-column align-items-center w-100">
        <p class="h3">Lista de participantes</p>



        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Email</th>
                @if($propietario->id == Auth::user()->id)
                    <th scope="col">Acción</th>
                @endif
            </tr>
            </thead>
            <tbody>

            @foreach($listaUsuarios as $usuario)

                <form method="post" action="{{route("eliminarUsuarioProyecto")}}">
                    @csrf
                    <tr>
                        <input type="hidden" name="idUsuario" value="{{$usuario->id}}">
                        <th scope="row">{{$x++}}</th>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->apellidos}}</td>
                        <td>{{$usuario->email}}</td>
                        @if($propietario->id == Auth::user()->id)
                            @if($usuario->id == $propietario->id)
                                <td><input type="submit" class="btn btn-dark" value="Propietario" disabled></td>
                            @else
                                <td><input type="submit" class="btn btn-dark" value="Eliminar"></td>
                            @endif
                        @endif
                    </tr>
                </form>

            @endforeach

            </tbody>
        </table>

        @if($propietario->id == Auth::user()->id)
            <button type="button" class="btn btn-dark align-self-start ml-3" data-toggle="modal" data-target="#AnadirParticipante">
                Añadir participante
            </button>
        @endif


        <!-- Modal -->
        <div class="modal fade" id="AnadirParticipante" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Añadir participante</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>


                    <div class="modal-body">
                        <!--FORMULARIO PARA AÑADIR USUARIOS-->
                        <div class="form-group d-flex">
                            <input type="email" name="email" class="form-control" id="email" placeholder="antonio@siwo.com">
                            <button class="btn btn-dark ml-2" onclick="comprobarEmail()">Invitar</button>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <script>
        function comprobarEmail(){

            let _token   = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "/comprobarEmail",
                type:"POST",
                data:{
                    _token: _token,
                    email: $("#email").val(),
                },
                success:function(response){
                    if(response == "0"){
                        alert("No existen usuarios con ese correo.");
                    }else{
                        alert("Invitación enviada correctamente.");
                        $("#email").val("");
                    }
                },
            });

        }
    </script>

@endsection
