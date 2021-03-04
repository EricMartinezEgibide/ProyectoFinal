
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route("home")}}">
        <img style="max-height: 40px" src="images/logo.png">
    </a>

    <a class="navbar-brand" href="#" data-toggle="modal" data-target="#perfil">
        <label class="mr-2">Hola, {{Auth::user()["nombre"]}}</label>
        <img style="max-height: 40px" src="images/userDefault.png">
    </a>

</nav>

<!--PERFIL-->

<div>

    <!-- Modal -->
    <div class="modal fade" id="perfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Datos de tu perfil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="formUsuario" method="post" action="{{route("editarUsuario")}}">
                    @csrf

                    <div class="modal-body">

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nombre</label>
                                <input type="text" class="form-control" id="ipNombre" name="nombre" value="{{Auth::user()["nombre"]}}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Apellidos</label>
                                <input type="text" class="form-control" id="ipApellidos" name="apellidos" value="{{Auth::user()["apellidos"]}}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Email</label>
                                <input type="email" class="form-control" id="ipEmail" name="email" value="{{Auth::user()["email"]}}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Contraseña</label>
                                <input type="password" class="form-control" id="ipPass" name="password" placeholder="*********" readonly>
                            </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button id="btCerrarSesion" type="button" class="btn btn-secondary" data-dismiss="modal" onclick="document.location.href = '/'">Cerrar sesión</button>
                        <button id="btCancelar" type="button" class="btn btn-secondary" onclick="bloquear()" style="display: none">Cancelar</button>

                        <button id="btEditar" type="button" class="btn btn-dark" onclick="desbloquear()">Editar</button>
                        <input id="btAplicar" type="submit" value="Aplicar" class="btn btn-dark" style="display: none">
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>
