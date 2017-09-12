@extends('layouts.admin')

@section('title', 'Novo Cliente')

@push('styles')
<link rel="stylesheet" href="{{ mix('css/admin.css') }}">
@endpush

@push('scripts')
<script src="{{ mix('js/admin.js') }}" type="text/javascript" charset="utf-8"></script>
<script>
    $('#cancel').click(function () {
        window.location.href = $(this).data('href');
    });

    @if ($errors->any())
        errors = {!! json_encode($errors->all()) !!}
        notify(errors, 'error', 'Erro');
    @endif
</script>
@endpush

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Novo Cliente</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form id="clients-form" class="form-horizontal form-label-left"
                      method="post"
                      action="{{ route('manager.clients.store') }}">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="null">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nome
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="name" required="required" name="name"
                                   class="form-control col-md-7 col-xs-12"
                                   value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email *
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="email" id="email" name="email" required="required"
                                   class="form-control col-md-7 col-xs-12"
                                   value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Palavra-Passe *
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="password" id="password" name="password" required="required"
                                   class="form-control col-md-7 col-xs-12"
                                   value="{{ old('password') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password-confirmation">Confirmar Palavra-Passe *
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="password" id="password-confirmation" name="password_confirmation" required="required"
                                   class="form-control col-md-7 col-xs-12"
                                   value="{{ old('password_confirmation') }}">
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" type="button" id="cancel" data-href="{{ route('manager.clients') }}">Cancelar</button>
                            <button type="submit" class="btn btn-success">Criar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
