@extends('layouts.app')
@section('content')

	<div class="row">
		<div class="col-xs-6 col-sm-4 col-md-3 col-md-offset-3 col-sm-offset-2">
			<div class="form-group">
				<select class="form-control input-sm" id="brandSort" onchange="brandSort(this)" style="border-radius: 5px; margin-top: 5px;">
					<option value="0">Бренд</option>
				</select>
			</div>
		</div>
		<div class="col-xs-6 col-sm-4 col-md-3 ">
			<div class="form-group">
				<select class="form-control input-sm" id="typeSort" onchange="typeSort(this)" style="border-radius: 5px; margin-top: 5px;">
					<option value="0">Сортировка</option>
					<option value="1">по цене</option>
					<option value="2">по бренду</option>
				</select>
			</div>
		</div>
		@foreach($items as $item)
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 itemBasicOnList">
						<div class="panel panel-default panelItemOnList">
							<a class="aboutItem" href="{{asset('/cars')}}/{{Session::get('car_alias')}}/select/{{$item->name}}_{{$item->code}}">
								<div class="panel-heading itemHeadOnList">
									<h4 class="title">{{$item->name}} {{$brands[$item['id']][0]['name']}}</h4>
									<img class="itemLogoOnList" src="{{ asset('img/items')}}/{{$item->image}}  ">
									<p class="priceOnList"><strong>{{$item->price}} грн </strong></p>
								</div>
							</a>
							<div class="panel-body itemBodyOnList">
								<button type="submit" class="btn pull-right buy_{{$item->id}} buyOnList" onclick="addToCart({{$item->id}})">
									Купить
								</button>
							</div>
						</div>
					
				</div>

		@endforeach
	</div>

@stop
