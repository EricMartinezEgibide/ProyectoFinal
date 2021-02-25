<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Registro</title>
        <link href="/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg my-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Registro</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputNickname">Usuario</label>
                                                <input class="form-control py-4 @error('name') is-invalid @enderror"
                                                       id="inputNickname" type="text"
                                                       placeholder="Teclea tu nombre de usuario"
                                                       name="name" value="{{ old('name') }}"
                                                       required autocomplete="name" autofocus/>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4 @error('email') is-invalid @enderror"
                                                       id="inputEmailAddress" type="email"
                                                       aria-describedby="emailHelp"
                                                       placeholder="Teclea tu dirección de correo electrónico"
                                                       name="email" value="{{ old('email') }}"
                                                       required autocomplete="email"/>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputPassword">Contraseña</label>
                                                        <input class="form-control py-4
                                                               @error('password') is-invalid @enderror"
                                                               id="inputPassword" type="password"
                                                               placeholder="Teclea tu contraseña" name="password"
                                                               required autocomplete="new-password"/>
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputConfirmPassword">
                                                            Repite Contraseña
                                                        </label>
                                                        <input class="form-control py-4" id="inputConfirmPassword"
                                                               type="password" placeholder="Confirma contraseña"
                                                               name="password_confirmation"
                                                               required autocomplete="new-password"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">
                                                            Nombre <span>(opcional)</span>
                                                        </label>
                                                        <input class="form-control py-4" id="inputFirstName"
                                                               type="text" placeholder="Teclea tu nombre"
                                                               name="nombre" value="{{ old('nombre') }}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">
                                                            Apellidos <span>(opcional)</span>
                                                        </label>
                                                        <input class="form-control py-4" id="inputLastName"
                                                               type="text" placeholder="Teclea apellidos"
                                                               name="apellidos" value="{{ old('apellidos') }}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0">
                                                <button type="submit" class="btn btn-primary btn-block">
                                                    Crear cuenta
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small">
                                            <a href="{{route('login')}}">Tienes una cuenta? Ir al login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    </body>
</html>