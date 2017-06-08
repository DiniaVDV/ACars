@extends('layouts.app')
@section('content')

	<div class="row">
		@foreach($items as $item)
				<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 itemBasicOnList">
					 
						<div class="panel panel-default panelItemOnList">
							<a class="aboutItem" href="{{asset('/cars')}}/{{$car->alias}}/select/{{$item->name}}_{{$item->code}}">
								<div class="panel-heading itemHeadOnList">
									<h4 class="title">{{$item->title}} {{$brands[$item['id']][0]['name']}}</h4>
									<img class="itemLogoOnList" src="{{ asset('img/logo_1.jpg') }} ">
									<p id="priceOnList"><strong>{{$item->price}} грн </strong></p>
								</div>
							</a>
							<div class="panel-body itemBodyOnList">
								<button type="submit" class="btn pull-right buy_{{$item->id}} buyOnList" onclick="">
									Купить
								</button>
							</div>
						</div>
					
				</div>

		@endforeach
	</div>

@stop
