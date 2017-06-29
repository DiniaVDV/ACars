
@component('mail::message')
<p>Добрый день, {{$user->name}}!</p>
<p>Заказ № {{$order->id}} размещен. Сумма заказа {{$order->total_price}}грн.</p>

Хорошего дня,<br>
{{ config('app.name') }}!

@endcomponent
