@component('mail::message')
{{ $user->name }} 様

ご登録ありがとうございました。

{{ config('app.name') }}
@endcomponent