@extends('layouts.app')
@section('content')

	<div class="row">
		@foreach($items as $item)
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 itemBasicOnList">				 
						<div class="panel panel-default panelItemOnList">
							<a class="aboutItem" href="{{asset('/cars')}}/{{$car->alias}}/select/{{$item->name}}_{{$item->code}}">
								<div class="panel-heading itemHeadOnList">
									<h4 class="title">{{$item->name}} {{$brands[$item['id']][0]['name']}}</h4>
									<img class="itemLogoOnList" src="{{ asset('img/items')}}/{{$item->img}}  ">
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
