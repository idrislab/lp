@component('mail::message')
# Nova Subscrição

{{ $subscriber->name }} subscreveu a {{ $landingPage->name }}

@component('mail::button', ['url' => route('client.subscribers', [ $landingPage->id ]) ])
Ver Subscrição
@endcomponent

@endcomponent