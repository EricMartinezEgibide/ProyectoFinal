@extends('layouts.authLayout')

@section('content')

    <body>
    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="d-none d-md-flex col-md-4 col-lg-6 " id="fondo1" ><a href="/"></a> </div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto d-flex flex-column  ">
                                <img src="/media/Solo_dibujo.png " class="d-block d-md-none  align-self-center mb-5">
                                <h3 class="login-heading mb-4 text-center">Recuperacion de contraseña</h3>
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf



                                    <div class="form-label-group">

                                        <input id="inputEmail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder=" introduce tu Email">

                                        <label for="inputEmail">introduce tu Email</label>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>



                                        <button class="btn btn-lg btn-dark btn-block btn-login text-uppercase col-12  align-self-center font-weight-bold mb-2" id="b-login1" type="submit">Enviar</button>
                                        <div class="text-center">
                                            <a  href="/">Login </a>|<a href="/register"> Registrate</a></div>

                                </form>


                                    <div class="alert alert-success alert-dismissible fade show"  style="display: none" role="alert">
                                        <strong>Correo enviado correctamente</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection
