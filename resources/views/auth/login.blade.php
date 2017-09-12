@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ mix('css/auth.css') }}">
@endpush

@push('scripts')
<script src="{{ mix('js/auth.js') }}"></script>
@endpush

@section('content')
    <div class="login-page">
        <div class="form">
            <legend>Login</legend>
            <form class="form-horizontal login-form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control" name="email"
                               value="{{ old('email') }}" required autofocus placeholder="Email">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control" name="password" required
                               placeholder="Palavra-Passe">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"
                                       name="remember" {{ old('remember') ? 'checked' : '' }}> Lembrar-me
                            </label>
                        </div>
                    </div>
                </div>

                <button>Iniciar Sessão</button>

                <p class="message">
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Recuperar Palavra-Passe?
                    </a>
                </p>
            </form>
        </div>
    </div>
@endsection
