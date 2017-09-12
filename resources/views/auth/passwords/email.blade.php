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

            <legend>Recuperar Palavra-Passe</legend>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                               required placeholder="Email">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <button>Enviar link de recuperação</button>
            </form>
        </div>
    </div>
@endsection
