@extends('admin.app')
@section('content')
    <h1 class="page-header">Товары</h1>
    @include('admin.partials.flash')

    <div class=bs-example data-example-id=striped-table>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Название</th>
                <th class="tableCenter">Бренд</th>
                <th class="tableCenter">Код товара</th>
                <th class="tableCenter">Описание</th>
                <th class="tableCenter">Список автомобилей</th>
                <th class="tableCenter">Цена</th>
                <th class="tableCenter">Количество</th>
                <th class="tableCenter">Действия</th>
            </tr>
            </thead>
			@foreach($items as $item)
				<tbody>
					<tr>
						<td>
							<div>
								<strong>{{$item->id}}</strong></td>
							</div>
						<td><strong>{{$item->name}}</strong></td>
						<td align="center"><strong>{{!empty($item->brand_id) ? $brands[$item->brand_id] : 'null'}}</strong></td>
						<td align="center"><strong>{{$item->code}}</strong></td>
						<td align="center"><strong>{{$item->description}}</strong></td>
						<td align="center">
							<strong>
								@foreach($item->car_list as $car)
									{{$cars[$car]}}
								@endforeach
							</strong>
						</td>
						<td align="center"><strong>{{$item->price}}</strong></td>
						<td align="center"><strong>{{$item->amount}}</strong></td>
						<td align="center" class="actionCol">
							<ul class="nav navbar-top-links">
								<li class="actioned">
									<a href="{{asset('admin/items')}}/{{$item->id}}/edit" title="редактировать"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								</li>
								<li class="actioned">
									<a href="{{asset('admin/items')}}/{{$item->id}}/delete" onclick="return confirmDelete('товар')" title="удалить"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
								</li>
							</ul>
						</td>
					</tr>
				</tbody>
			@endforeach
        </table>
    </div>
	@include('partials.pagination', ['paginate' => $items])
@endsection