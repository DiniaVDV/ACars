@extends('layouts.appWithoutSidebar')

@section('content')
	<div class="col-md-11 col-md-offset-1">
		<h3>{{$item->name}} {{$item->code}} {{$brand->name}}</h3>
	</div>
	<div class="col-md-3 col-md-offset-1">

		<img class="itemPicture" src="{{asset('/img')}}/items/{{$item->image}}">
	</div>
	<div class="col-md-8">
		<p>Производитель: {{ucfirst($brand->name)}}, {{ucfirst($brand->country)}}</p>
		@foreach($item->description as $description)
			<p>{{ $description}}</p>
		@endforeach
	</div>
	<div class="col-md-8">
		<button type="submit" class="btn buy_{{$item->id}} buyOn" onclick="addToCart({{$item->id}})">
			Купить
		</button>
	</div>

	<div class="col-md-6 col-md-offset-4">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#applicability" aria-controls="applicability" role="tab" data-toggle="tab">Применяемость</a></li>
			<li role="presentation"><a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">Отзывы</a></li>
			<li role="presentation"><a href="#shipping_and_payment" aria-controls="shipping_and_payment" role="tab" data-toggle="tab">Доставка и оплата</a></li>
			<li role="presentation"><a href="#analogues" aria-controls="analogues" role="tab" data-toggle="tab">Аналоги</a></li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="applicability">
				<p>
					@if(!empty($cars))
					@foreach($cars as $car)
						{{$car->brand}} {{$car->model}}({{$car->engine}}),
					@endforeach
					@else
						Данные отсутствуют!
					@endif
				</p>
			</div>
			<div role="tabpanel" class="tab-pane" id="reviews">
				@include('partions.comments')
			</div>
			<div role="tabpanel" class="tab-pane" id="shipping_and_payment">
				<p><strong>Возможные формы оплаты:</strong></p>

				<p>Наличный расчет в офисе или курьеру<br/>
				Банковской картой<br/>
				Наложенным платежом</p>

				<p><strong>Возможные варианты доставки:</strong></p>
				<p>Доставка по Киеву<br/>
					Доставка по Украине<br/>
					Самовывоз</p>
				<a href="{{asset('/payment_and_delivery')}}">Подробнее</a>
			</div>
			<div role="tabpanel" class="tab-pane" id="analogues">
				@if(!empty($listOfItems))
					<ul class="list-group">
					@foreach($listOfItems as $brand => $listOfItem)
						<li class="list-group-item analogues">
							<a href="{{asset('select')}}/{{$listOfItem->alias}}_{{$listOfItem->code}}">{{$listOfItem->name}} {{$listOfItem->code}} {{$brand}}</a>
							<span class="label label-success pull-right">{{$item->price}} грн.</span>
						</li>
					@endforeach
					</ul>
				@else
					Данные отсутствуют!
				@endif

			</div>
		</div>
	</div>
@endsection()