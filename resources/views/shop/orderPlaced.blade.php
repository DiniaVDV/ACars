@extends('layouts.appWithoutSidebar')

@section('content')
    <h2>Спасибо! Ваш заказ размещен по №{{$order->id}} на общую сумму {{$order->total_price}}.  </h2>
	<p>Наш менеджер свяжется с Вами в ближайшее время.</p>
@endsection