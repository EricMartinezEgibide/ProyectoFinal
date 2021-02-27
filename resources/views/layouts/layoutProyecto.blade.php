
<head>
    <link rel="icon" type="image/png" href="images/logo.png">
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link type="text/css" rel="stylesheet" href="/css/proyectos.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">



<nav class=" sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="">
        <img style="max-height: 40px" src="images/logo.png">
    </a>

    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i>
    </button>

        <a class="navbar-brand" href="#" data-toggle="modal" data-target="#perfil">
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
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="nombre" value="{{Auth::user()["nombre"]}}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Apellidos</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="apellidos" value="{{Auth::user()["apellidos"]}}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" name="email" value="{{Auth::user()["email"]}}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Contraseña</label>
                            <input type="password" class="form-control" id="exampleFormControlInput1" name="password" placeholder="*********" disabled>
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="document.location.href = '/'">Cerrar sesión</button>
                        <input type="submit" value="Editar" class="btn btn-dark">
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
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="index.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Interface</div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts"
                       aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Layouts
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                         data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="layout-static.html">Static Navigation</a>
                            <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                       aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Pages
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
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
                    <div class="sb-sidenav-menu-heading">Addons</div>
                    <a class="nav-link" href="charts.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Charts
                    </a>
                    <a class="nav-link" href="tables.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Tables
                    </a>
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

