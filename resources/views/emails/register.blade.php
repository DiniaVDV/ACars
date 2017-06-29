@component('mail::message')
<p>Добрый день, {{$user->name}}!</p>
<p>Для подтверждения регистрации, пройдите по  <a href="{{asset('/registry/confirm/') . '/' . $token}}"> ссылке </a></p>

Хорошего дня,<br>
{{ config('app.name') }}!
@endcomponent
