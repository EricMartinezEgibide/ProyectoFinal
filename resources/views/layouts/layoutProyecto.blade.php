<head>

    <link rel="icon" type="/image/png" href="/images/logo.png">
    <link href="/css/styles.css" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
          crossorigin="anonymous"/>
    <link type="text/css" rel="stylesheet" href="/css/proyectos.css">
    <link rel="stylesheet" href="/css/archivos.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"
            crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed vh-100">



<nav class=" sb-topnav navbar navbar-expand navbar-dark bg-dark d-flex justify-content-between">
    <a class="navbar-brand" href="/home">
        <img style="max-height: 40px" src="/images/logo.png">
    </a>


    <div class="d-flex flex-nowrap">
        <a class="navbar-brand d-flex" href="#" data-toggle="modal" data-target="#perfil">
            <label class="mr-2 d-none d-md-block">Hola, {{Auth::user()["nombre"]}}</label>
            <img style="max-height: 40px" src="/images/userDefault.png">
        </a>
        <button class="btn  btn-link btn-sm " id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
        </button>
    </div>

</nav>


<!--PERFIL-->

<div>

    <!-- Modal -->
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
                            <input type="email" class="form-control" id="ipEmail" name="email" value="{{Auth::user()["email"]}} " readonly>
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

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark border-" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Menú</div>
                    <a class="nav-link" href="{{route('abrirProyecto',$_COOKIE['idProyecto'])}}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-comments"></i>
                        </div>
                        Inicio/Chat
                    </a>

                    <a class="nav-link" href="{{route('multimedia')}}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-file-image"></i>
                        </div>
                        Archivos
                    </a>

                    <a class="nav-link" href="{{route('UsuariosProyectos')}}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-users-cog"></i>
                        </div>
                        Participantes
                    </a>

                    <a class="nav-link" href="{{route('estadisticas')}}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-align-left"></i>
                        </div>
                        Estadísticas
                    </a>
                    <a class="nav-link" href="{{route('mostrarTareas')}}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        Tareas
                    </a>


                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                         data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link collapsed" href="#" data-toggle="collapse"
                               data-target="#pagesCollapseAuth" aria-expanded="false"
                               aria-controls="pagesCollapseAuth">
                                Authentication
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                 data-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="login.html">Login</a>
                                    <a class="nav-link" href="register.html">Register</a>
                                    <a class="nav-link" href="password.html">Forgot Password</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse"
                               data-target="#pagesCollapseError" aria-expanded="false"
                               aria-controls="pagesCollapseError">
                                Error
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                                 data-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="401.html">401 Page</a>
                                    <a class="nav-link" href="404.html">404 Page</a>
                                    <a class="nav-link" href="500.html">500 Page</a>
                                </nav>
                            </div>
                        </nav>
                    </div>

                </div>
            </div>

        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main class="  bg-light d-flex flex-column flex-md-row h-100  ">

            @yield('content')

        </main>
        @include('partials.footer')


    </div>
</div>


@include('partials.proyecto_scripts')


</body>
