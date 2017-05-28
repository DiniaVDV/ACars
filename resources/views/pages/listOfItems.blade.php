@extends('layouts.app')
@section('content')

	<div class="row">
		@foreach($items as $item)
				<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 itemBasicOnList">
					 <a href="#">
						<div class="panel panel-default panelItemOnList">
							<div class="panel-heading itemHeadOnList">
								<h4 class="title">{{$item->title}} {{$brands[$item['id']][0]['name']}}</h4>
							</div>
							<div class="panel-body itemBodyOnList">
								<img class="itemLogoOnList" src="{{ asset('img/logo_1.jpg') }} ">
								<p id="priceOnList"><strong>{{$item->price}} грн </strong></p>
								<button type="submit" class="btn pull-right buy_{{$item->id}}" id="buyOnList" onclick="addToCart({{$item->id}})">
									Купить
								</button>
							</div>
						</div>
					</a>
				</div>

		@endforeach
	</div>

@stop
