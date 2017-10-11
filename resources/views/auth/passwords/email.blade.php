@extends('auth.layouts.app')

@section('content')
 
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

@if (count($errors) > 0)
<div class="alert alert-danger">  
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="login-box-body">
<p class="login-box-msg">Restablecer la contraseña</p>
<form action="{{ route('password.email') }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Correo" autofocus/>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="row">
        <div class="col-xs-2">
        </div><!-- /.col -->
        <div class="col-xs-8">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Enviar al correo</button>
        </div><!-- /.col -->
        <div class="col-xs-2">
        </div><!-- /.col -->
    </div>
</form>

<a href="{{ url('/login') }}">Log in</a><br>

@endsection
