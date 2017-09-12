@extends('layouts.admin')

@section('title', 'Landing Pages')

@push('styles')
<link href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<link rel="stylesheet" href="{{ mix('css/admin.css') }}">
@endpush

@push('scripts')
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>

<script src="{{ mix('js/admin.js') }}"></script>
<script>
    $(function () {
        var landingPagesTable = table('#landing-pages-list', false);

        $('a.delete-button').click(function (e) {
            e.preventDefault();

            var element = $(this);

            $.ajax({
                method: 'DELETE',
                url: $(this).data('href'),
                data: {
                    '_token': '{{ csrf_token() }}',
                },
                dataType: 'json',
            })
                .done(function (data) {
                    notify(data, 'success', 'Sucesso');
                    element.parents('tr').addClass('deleted');
                    landingPagesTable.row('.deleted').remove().draw(false);
                })
                .fail(function (jqXHR) {
                    if (jqXHR.status == 422) {
                        notify(jqXHR.responseJSON, 'notice', 'Erro');
                    }
                });
        });
    });
</script>
@endpush

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Landing Pages</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <a href="{{ route('manager.landingPages.create') }}" id="create-landing-page" class="btn btn-info">Criar Landing Page</a>
        <table id="landing-pages-list" class="table table-striped table-bordered table-hover dt-responsive nowrap"
               cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Subscrições</th>
                <th>Email</th>
                <th>URL</th>
                <th>Cliente</th>
                <th>Data de Criação</th>
                <th>Última Actualização</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($landingPages as $landingPage)
                @php
                    $url = 'http://' . $landingPage->domain;
                    $badge = '';

                    if($landingPage->slug !== 'index') {
                        $url .= '/'. $landingPage->slug;
                    } else {
                        $badge = ' <span class="label label-info">index</span>';
                    }
                @endphp
                <tr>
                    <td>{{ $landingPage->name }}</td>
                    <td>{{ $landingPage->subscribers()->count() }}</td>
                    <td>{{ $landingPage->email }}</td>
                    <td>{!! $url . $badge !!}</td>
                    <td>{{ $landingPage->client->name }}</td>
                    <td>{{ $landingPage->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $landingPage->updated_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="{{ $url }}" data-toggle="tooltip" data-placement="top"
                           data-title="Visualizar" target="_blank">
                            <i class="fa fa-eye fa-lg"></i>
                        </a>
                        <a class="btn btn-xs btn-info"
                           href="{{ route('manager.landingPages.edit', [ 'id' => $landingPage->id ]) }}"
                           data-toggle="tooltip" data-placement="top"
                           data-title="Editar">
                            <i class="fa fa-pencil fa-lg"></i>
                        </a>
                        <a class="delete-button btn btn-xs btn-danger"
                           data-href="{{ route('manager.landingPages.destroy', [ 'id' => $landingPage->id ]) }}"
                           data-title="Apagar"
                           data-toggle="tooltip" data-placement="top">
                            <i class="fa fa-trash-o fa-lg"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal fade confirm-delete" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Apagar</h4>
                </div>
                <div class="modal-body">
                    <h2>Tem certeza que deseja apagar a Landing Page?</h2>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger">Apagar</button>
                </div>

            </div>
        </div>
    </div>

@endsection