@extends('auth.layouts.app')

@section('content')
 
  <div class="login-box-body">
    <p class="login-box-msg">Iniciar sesión</p>

    <form action="{{ route('login') }}" method="post">
    {{ csrf_field() }}
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"  autofocus placeholder="Correo">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
        <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordar
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block">Entrar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- O -</p>
      <a href="{{ url('/auth/facebook') }}" class="btn btn-block btn-social btn-facebook"><span class="fa fa-facebook"></span>  Continuar con Facebook</a>      
      <a href="#" class="btn btn-block btn-social btn-google"><i class="fa fa-google"></i> Iniciar sesión usando Google</a>    
    </div>
    
    <!-- /.social-auth-links -->

    <a href="{{ route('password.request') }}"> Olvidé mi contraseña</a><br>    

@endsection
