@extends('layouts.admin')

@section('title', 'Clientes')

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
        var clientsTable = table('#clients-list');

        $('a.delete-client').click(function (e) {
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
                    clientsTable.row('.deleted').remove().draw(false);
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
            <h3>Clientes</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <a href="{{ route('manager.clients.create') }}" id="create-client" class="btn btn-info">Novo Cliente</a>
        <table id="clients-list" class="table table-striped table-bordered table-hover dt-responsive nowrap"
               cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Landing Pages</th>
                <th>Data de Criação</th>
                <th>Última Actualização</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->landingPages()->count() }}</td>
                    <td>{{ $client->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $client->updated_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="" data-toggle="tooltip" data-placement="top"
                           data-title="Visualizar">
                            <i class="fa fa-eye fa-lg"></i>
                        </a>
                        <a class="btn btn-xs btn-info"
                           href="{{ route('manager.clients.edit', [ 'id' => $client->id ]) }}" data-toggle="tooltip"
                           data-placement="top"
                           data-title="Editar">
                            <i class="fa fa-pencil fa-lg"></i>
                        </a>
                        <a class="delete-client btn btn-xs btn-danger"
                           data-href="{{ route('manager.clients.destroy', [ 'id' => $client->id ]) }}" data-toggle="tooltip"
                           data-placement="top"
                           data-title="Apagar">
                            <i class="fa fa-trash-o fa-lg"></i>
                        </a>
                        {{--@if(!$user->hasRole('administrator'))--}}
                        {{--<button class="btn btn-xs btn-danger user_destroy"--}}
                        {{--data-url="{{ route('admin.users.destroy', [$user->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.delete') }}">--}}
                        {{--<i class="fa fa-trash"></i>--}}
                        {{--</button>--}}
                        {{--@endif--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection