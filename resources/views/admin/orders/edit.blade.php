@extends('admin.app')
@section('content')

<h3>Редактирование заказа:</h3><br/>
<br/>
    {!! Form::model($order, ['method' => 'PATCH', 'action' => ['Admin\OrdersController@update', $order->id]]) !!}
		@include('admin.orders.form', ['submitButtonText' => 'Обновить заказ'])
    {!! Form::close() !!}
	@include('errors.list')
@endsection