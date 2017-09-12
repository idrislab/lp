@extends('layouts.admin')

@section('title', 'Subscrições')

@push('styles')
<link href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<link rel="stylesheet" href="{{ mix('css/client.css') }}">
@endpush

@push('scripts')
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>

<script src="{{ mix('js/client.js') }}"></script>
<script>
    $(function () {
        var landingPagesTable = table('#landing-pages-list', true);
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
        <table id="landing-pages-list" class="table table-striped table-bordered table-hover dt-responsive nowrap"
               cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Subscrições</th>
                <th>Email</th>
                <th>URL</th>
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
                    <td>{{ $landingPage->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $landingPage->updated_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a class="btn btn-xs btn-info" href="{{ route('client.subscribers', [ $landingPage->id ]) }}" data-toggle="tooltip" data-placement="top"
                           data-title="Subscrições">
                            <i class="fa fa-users fa-lg"></i>
                        </a>  <a class="btn btn-xs btn-primary" href="{{ $url }}" data-toggle="tooltip" data-placement="top"
                           data-title="Visualizar" target="_blank">
                            <i class="fa fa-eye fa-lg"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection