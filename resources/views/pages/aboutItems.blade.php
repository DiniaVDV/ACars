@extends('layouts.app')
@section('content')

				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 itemBasic">
					 <a href="#">
						<div class="panel panel-default item">
							<div class="panel-heading itemHead">
								<h4 class="title"><?=$item['title']?> <?=$brands[$item['id']][0]['name']?></h4>
							</div>
							<div class="panel-body">
								<img class="itemLogo" src="{{ asset('img/logo_1.jpg') }} ">
								<p id="price"><strong>{{$item['price']}} грн </strong></p>
								<button type="submit" class="btn" id="buy">
									Купить
								</button>
							</div>
						</div>
					</a>
				</div>



@stop
