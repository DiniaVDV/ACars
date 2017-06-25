@extends('admin.app')
@section('content')
    <h1 class="page-header">История заказов</h1>
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
                <tr>
                    <td><strong>{{$order->id}}</strong></td>
                    <td><strong>{{$users[$order->user_id]}}</strong></td>   
					<td align="center"><strong>{{$order->total_price}}</strong></td>                   
					<td align="center"><strong>{{$typeOfDelivery[$order->type_of_delivery_id]}}</strong></td>                   
					<td align="center"><strong>{{$typeOfPayment[$order->type_of_payment_id]}}</strong></td>                   
					<td align="center"><strong>{{$order->status}}</strong></td>                   
					<td align="center"><strong>{{$order->comment}}</strong></td>                   
					<td align="center"><strong>{{$order->created_at}}</strong></td>
                    <td align="center">
                        <a href="{{asset('admin/orders')}}/{{$order->id}}/details" title="детали заказа"><i class="fa fa-eye" aria-hidden="true"></i></a>
						<a href="{{asset('admin/orders')}}/{{$order->id}}/edit" title="редактировать"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a href="{{asset('admin/orders')}}/{{$order->id}}/delete" onclick="return confirmDelete('заказ')" title="удалить"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </td>
                </tr>
            </tbody>
    @endforeach
        </table>
    </div>
@endsection