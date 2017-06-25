@extends('admin.app')
@section('content')
    <h2 class="page-header">Детали заказа № {{$orderDetails[0]->order_id}} от {{$createdAt->toDateTimeString()}}. Покупатель <a href="{{asset('/user')}}/{{Auth::user()->name}}" title="данные покупателя">{{Auth::user()->name}}</a>. </h2>
    @include('admin.partials.flash')

    <div class=bs-example data-example-id=striped-table>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Название товара</th>
                <th class="tableCenter">Цена</th>
                <th class="tableCenter">Количество</th>
                <th class="tableCenter">Сумма</th>
                <th class="tableCenter">Статус</th>
                <th class="tableCenter">Действие</th>
            </tr>
            </thead>
    @foreach($orderDetails as $item)
            <tbody>
                <tr>
                    <td><strong>{{$nameItems[$item->id]}}</strong></td>
                    <td align="center"><strong>{{$item->price}}</strong></td>   
					<td align="center"><strong>{{$item->qty}}</strong></td>                   
					<td align="center"><strong>{{$item->price * $item->qty}}</strong></td>               
					<td align="center">
						<strong>
							<div class="form-group">
								<select class="form-control" id="status" name="status">
									<option value="processing">Обработка</option>
									<option value="delivering">Доставка</option>
									<option value="paid">Оплачено</option>
								</select >
							</div>
						</strong>
					</td>                                      
                    <td align="center">
						<a href="{{asset('admin/orders')}}/{{$item->order_id}}/edit/{{$item->id}}" title="редактировать"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a href="{{asset('admin/orders')}}/{{$item->order_id}}/delete/{{$item->id}}" onclick="return confirmDelete('позицию')" title="удалить"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </td>
                </tr>
            </tbody>
    @endforeach
        </table>
    </div>
@endsection