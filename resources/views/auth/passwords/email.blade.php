@extends('layout.plantilla_login')


@section('contenido')
<div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo">
                <img src="/adminlte/dist/img/logo_letras.png" alt="Logo">
            </div>
            <h1 class="auth-title">Has olvidado tu contraseña</h1>
            <p class="auth-subtitle mb-4">Ingrese su correo electrónico y le enviaremos un enlace para restablecer la contraseña.</p>

      <form method="POST" action="{{ route('password.email') }}">
                        @csrf


<div class="input-group mb-3">
<div class="input-group-prepend" auth-right>
<span class="input-group-text"><i class="fas fa-envelope"></i></span>
</div>
 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>

 @error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
 @enderror
</div>

                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-4">Enviar</button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
                <p class='text-gray-600'>¿Recuerdas tu cuenta? <a href="{{ route('login') }}" class="font-bold link">Log in</a>.
                </p>
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right-2">

        </div>
    </div>
</div>

    </div>

    @endsection
