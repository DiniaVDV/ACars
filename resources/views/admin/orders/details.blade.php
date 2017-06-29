@extends('admin.app')
@section('content')
    <h2 class="page-header" id="{{$orderDetails[0]->order_id}}">Детали заказа № {{$orderDetails[0]->order_id}} от {{$createdAt->toDateTimeString()}}. Покупатель <a href="{{asset('/user')}}/{{Auth::user()->name}}" title="данные покупателя">{{Auth::user()->name}}</a>. </h2>
    @include('admin.partials.flash')

    <div class=bs-example data-example-id=striped-table>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Название товара</th>
                <th class="tableCenter">Цена (грн)</th>
                <th class="tableCenter">Количество(шт.)</th>
                <th class="tableCenter">Сумма (грн)</th>
            </tr>
            </thead>
    @foreach($orderDetails as $item)
            <tbody>
                <tr> 
                    <td><strong>{{$nameItems[$item->id]}}</strong></td>
                    <td align="center"><strong>{{$item->price}}</strong></td>   
					<td align="center"><strong>{{ $item->qty}}</strong></td>                   
					<td align="center" class="sum"><strong>{{$item->price * $item->qty}}</strong></td>
                </tr>
            </tbody>
    @endforeach
        </table>
    </div>
@endsection