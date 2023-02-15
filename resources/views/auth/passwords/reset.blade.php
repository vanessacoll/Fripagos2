@extends('layout.plantilla_login')


@section('contenido')
<div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo">
                <img src="/adminlte/dist/img/logo_letras.png" alt="Logo">
            </div>
            <h1 class="auth-title">Restablecer contraseña</h1>
            <p class="auth-subtitle mb-4">Ingrese su nueva contraseña.</p>

<form method="POST" action="{{ route('password.update') }}">
                        @csrf

     <input type="hidden" name="token" value="{{ $token }}">


<div class="input-group mb-3">
<div class="input-group-prepend"auth-right>
<span class="input-group-text"><i class="fas fa-envelope"></i></span>
</div>
 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>

 @error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
 @enderror
</div>

<div class="input-group mb-3">
<div class="input-group-prepend">
<span class="input-group-text"><i class="fas fa-lock"></i></span>
</div>
<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="password" required autocomplete="new-password">


@error('password')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
  </span>
@enderror
</div>

<div class="input-group mb-3">
<div class="input-group-prepend">
<span class="input-group-text"><i class="fas fa-lock"></i></span>
</div>
<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="confirmar password" required autocomplete="new-password">

</div>


                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-4">Restablecer la contraseña</button>
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
