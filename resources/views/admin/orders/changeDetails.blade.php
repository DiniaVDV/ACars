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
                <th class="tableCenter">Действие</th>
            </tr>
            </thead>
    @foreach($orderDetails as $item)
            <tbody>
                <tr class="{{$item->item_id}}"> 
                    <td><strong>{{$nameItems[$item->id]}}</strong></td>
                    <td align="center" class="price"><strong>{{$item->price}}</strong></td>   
					<td align="center">
						<strong>
						{!!Form::text('qty', $item->qty, ['class' => 'form-control qty'])!!}
						</strong>
					</td>                   
					<td align="center" class="sum"><strong>{{$item->price * $item->qty}}</strong></td>                                                 
                    <td align="center">
						<a href="{{asset('admin/orders')}}/{{$item->order_id}}/edit/{{$item->id}}" title="редактировать"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a href="{{asset('admin/orders')}}/{{$item->order_id}}/delete/{{$item->id}}" onclick="return confirmDelete('позицию')" title="удалить"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </td>
                </tr>
            </tbody>
    @endforeach
			<tbody>
				<tr>
					<td></td>
					<td></td>
					<td align="right"><strong>Итого:</strong></td>
					<td id="totalPrice" align="center"><strong>{{$orderSum}}</strong></td>
					<td></td>
				</tr>
			</tbody>
        </table>
    </div>
@endsection