<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Registro</title>
        <link rel="icon" type="image/png" href="/media/Solo_dibujo.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
              integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
              crossorigin="anonymous">
        <link href="/css/registro.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-dark">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg my-5">
                                    <div class="card-header h- text-center">
                                        <img class="mh-100" src="/media/logo-fondo.png">
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="form-group">
                                                <div class="form-floating">
                                                    <input class="form-control py-4 @error('name') is-invalid @enderror"
                                                           id="inputNickname" type="text"
                                                           placeholder="Teclea tu nombre de usuario"
                                                           name="name" value="{{ old('name') }}"
                                                           required autocomplete="name"/>
                                                    <label class="small mb-1" for="inputNickname">Usuario</label>
                                                </div>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class="form-floating">
                                                    <input class="form-control py-4 @error('email') is-invalid @enderror"
                                                           id="inputEmailAddress" type="email"
                                                           aria-describedby="emailHelp"
                                                           placeholder="Teclea tu dirección de correo electrónico"
                                                           name="email" value="{{ old('email') }}"
                                                           required autocomplete="email"/>
                                                    <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                </div>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="form-floating">
                                                            <input class="form-control py-4
                                                                   @error('password') is-invalid @enderror"
                                                                   id="inputPassword" type="password"
                                                                   placeholder="Teclea tu contraseña" name="password"
                                                                   required autocomplete="new-password"/>
                                                            <label class="small mb-1" for="inputPassword">Contraseña</label>
                                                        </div>
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="form-floating">
                                                            <input class="form-control py-4" id="inputConfirmPassword"
                                                                   type="password" placeholder="Confirma contraseña"
                                                                   name="password_confirmation"
                                                                   required autocomplete="new-password"/>
                                                            <label class="small mb-1" for="inputConfirmPassword">
                                                                Repite Contraseña
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="form-floating">
                                                            <input class="form-control py-4" id="inputFirstName"
                                                                   type="text" placeholder="Teclea tu nombre"
                                                                   name="nombre" value="{{ old('nombre') }}" />
                                                            <label class="small mb-1" for="inputFirstName">
                                                                Nombre <span>(opcional)</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="form-floating">
                                                            <input class="form-control py-4" id="inputLastName"
                                                                   type="text" placeholder="Teclea apellidos"
                                                                   name="apellidos" value="{{ old('apellidos') }}" />
                                                            <label class="small mb-1" for="inputLastName">
                                                                Apellidos <span>(opcional)</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0">
                                                <button type="submit" class="btn btn-dark btn-block">
                                                    Crear cuenta
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small">
                                            <a href="{{route('index')}}">Tienes una cuenta? Ir al login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>

        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
                crossorigin="anonymous"></script>
        <script src="/js/registro.js"></script>
    </body>
</html>
