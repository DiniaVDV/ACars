@extends('user.profile')
@section('content')
    <h3>История заказов</h3>
    @if(!empty($orderDetails))
        @foreach($orderDetails as $orderId => $orderDetail)
        <h4 class="page-header">Детали заказа № {{$orderId}} от {{$createdAt[$orderId]->toDateTimeString()}} на сумму {{$sum[$orderId]}}грн.</h4>
        <div class=bs-example data-example-id=striped-table>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Название товара</th>
                        <th class="tableCenter">Цена (грн)</th>
                        <th class="tableCenter">Количество(шт.)</th>
                        <th class="tableCenter">Сумма (грн)</th>
                    </tr>
                </thead>
                <?php $i = 1;?>
                @foreach($orderDetail as $item)
                    <tbody>
                        <tr>
                            <td><strong>{{$i}}</strong></td>
                            <td><strong>{{!empty($nameItems[$orderId][$item->id]) ? $nameItems[$orderId][$item->id] : ''}}</strong></td>
                            <td align="center"><strong>{{$item->price}}</strong></td>
                            <td align="center"><strong>{{ $item->qty}}</strong></td>
                            <td align="center" class="sum"><strong>{{$item->price * $item->qty}}</strong></td>
                        </tr>
                    </tbody>
                    <?php $i++; ?>
                @endforeach
            </table>
        </div>
        @endforeach
    @else
        <p>У Вас нет заказов!</p>
    @endif
@endsection