@extends('admin.app')
@section('content')
    <h1 class="page-header">Заказы в процесе</h1>
    @include('admin.partials.flash')

    <div class=bs-example data-example-id=striped-table>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Номер заказа</th>
                <th>Имя пользователя</th>
                <th class="tableCenter">Сумма</th>
                <th class="tableCenter">Способ доставки</th>
                <th class="tableCenter">Способ оплати</th>
                <th class="tableCenter">Статус</th>
                <th class="tableCenter">Комментарий</th>
                <th class="tableCenter">Дата заказа</th>
                <th class="tableCenter">Действие</th>
            </tr>
            </thead>
    @foreach($orders as $order)
            <tbody>
                <tr class="{{$order->id}}">
                    <td><strong>{{$order->id}}</strong></td>
                    <td><strong>{{$users[$order->user_id]}}</strong></td>   
					<td align="center"><strong>{{$order->total_price}}</strong></td>                   
					<td align="center" class="{{$order->id}}">
						<strong>
							{!! Form::select('type_of_delivery_id', $typeOfDelivery, !empty($order->type_of_delivery_id) ? $order->type_of_delivery_id : null, ['class' => 'form-control type_of_delivery_id']) !!}	
						</strong>
					</td>                   
					<td align="center" class="{{$order->id}}">
						<strong>
							{!! Form::select('type_of_payment_id', $typeOfPayment, !empty($order->type_of_payment_id) ? $order->type_of_payment_id : null, ['class' => 'form-control type_of_payment_id']) !!}
						</strong>
					</td>                   
					<td align="center" class="{{$order->id}}">
						<strong>
							{!! Form::select('status_id', $orderStatus, !empty($order->status_id) ? $order->status_id : null, ['class' => 'form-control status_id']) !!}	
						</strong>
					</td>                   
					<td align="center"><strong>{{$order->comment}}</strong></td>                   
					<td align="center"><strong>{{$order->created_at}}</strong></td>
                    <td align="center">
                        <a href="{{asset('admin/orders')}}/{{$order->id}}/details/change" title="детали заказа"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a href="{{asset('admin/orders')}}/{{$order->id}}/delete" onclick="return confirmDelete('заказ')" title="удалить"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </td>
                </tr>
            </tbody>
    @endforeach
        </table>
    </div>
@endsection