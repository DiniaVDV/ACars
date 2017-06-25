@extends('admin.app')
@section('content')
    <h1 class="page-header">Детали заказа № {{$orderDetails[0]->order_id}} от {{$createdAt->toDateTimeString()}}. Покупатель <a href="{{asset('/user')}}/{{Auth::user()->name}}" title="данные покупателя">{{Auth::user()->name}}</a> </h1>
    <div class=bs-example data-example-id=striped-table>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Название товара</th>
                <th class="tableCenter">Цена</th>
                <th class="tableCenter">Количество</th>
                <th class="tableCenter">Сумма</th>
            </tr>
            </thead>
    @foreach($orderDetails as $item)
            <tbody>
                <tr>
                    <td><strong>{{$nameItems[$item->id]}}</strong></td>
                    <td align="center"><strong>{{$item->price}}</strong></td>   
					<td align="center"><strong>{{$item->qty}}</strong></td>                   
					<td align="center"><strong>{{$item->price * $item->qty}}</strong></td>
                </tr>
            </tbody>
    @endforeach
        </table>
    </div>
@endsection