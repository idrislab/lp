@extends('layouts.admin')

@section('title', $landingPage->name)

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
        table('#subcribers-table', true);
    });
</script>
@endpush

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>{{ $landingPage->name }}</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        @php
        $inputs = json_decode($subscribers->pluck('form')->first()) ? : [];
        @endphp
        <table id="subcribers-table" class="table table-striped table-bordered table-hover dt-responsive nowrap"
               cellspacing="0"
               width="100%" data-order="[[ {{ count((array) $inputs) }}, &quot;desc&quot; ]]">
            <thead>
            <tr>
                    @foreach($inputs as $input)
                        <th>{{ $input->description }}</th>
                    @endforeach
                    @if($inputs) <th>Data</th> @endif
            </tr>
            </thead>
            <tbody>
            @foreach($subscribers as $subscriber)
                <tr data-subscribed-id="{{ $subscriber->id }}">
                    @php
                        $inputs = json_decode($subscriber->form);
                    @endphp
                    @foreach($inputs as $input)
                        <td>{{ $input->value }}</td>
                    @endforeach
                    <td>{{ $subscriber->created_at->format('d/m/Y H:i:s') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
