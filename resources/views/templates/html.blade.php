@@extends('layouts.page')

@@section('title', 'Título')

@@push('styles')
@@endpush

@@push('scripts')
@@endpush

@@section('content')
    {{ htmlspecialchars('<button class="btn btn-info">Olá Mundo</button>') }}
@@endsection