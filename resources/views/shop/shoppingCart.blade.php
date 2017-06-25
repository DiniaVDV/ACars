@extends('layouts.appWithoutSidebar')

@section('content')
    @if(Cart::count() == null)
        <h2>Ваша корзина пуста!</h2>
    @else
		
     
		<div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
			<ul class="list-group shopCart">
				<li class="list-group-item">
					 <h2>Корзина:</h2>
				</li>
				@foreach($cart as $item)
					<li class="list-group-item">
						
						<strong>{{$item->name}}   {{$item->options->itemCode}} {{$item->options->brand[0]->name}}</strong>
						<span class="label label-success pull-right">{{$item->price * $item->qty}} грн.</span>
						<span class="badge qtyItemOnCart">{{$item->qty}}</span>
						<div class="btn-group pull-right">
							<button type="button" class="btn btn-primary btn-xs dropdown-toogle" data-toggle="dropdown">Действие <span class="caret"></span></button>
							<ul class="dropdown-menu">
								<li><a onclick="changeInstance({{$item->id}}, true, false)">Добавить 1 товар</a></li>
								<li><a onclick="changeInstance({{$item->id}}, false, false)">Удалить 1 товар</a></li>
								<li><a onclick="changeInstance({{$item->id}}, false, true)">Удалить все</a></li>
							</ul>
						</div>
					</li>
				@endforeach
			</ul>
		</div>     
		<div class="col-xs-12 col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
		   <strong>Итого: {{ceil(Cart::total())}} грн.</strong>
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 col-sm-offset-1 col-md-offset-2">
		   <a href="{{asset('checkout')}}" type="button" class="btn btn-success">Оформить</a>
		</div>  
		<div class="col-xs-3 col-sm-3 col-md-3 col-xs-offset-6 col-sm-offset-4 col-md-offset-2">
		   <a id="cleanCart" type="button" class="btn btn-danger pull-right" onclick="cleanCart()">Очистить корзину</a>
		</div>
  
    @endif
	<script>
	/**************action at page shoppingcart***********************************/
	function changeInstance(itemId, flag, deleteItem){
		$.ajax({
			type: "POST",
			url: "{{asset('change_instance')}}",
			data:{
				"_token": "{{csrf_token()}}",
				itemId : itemId,
				flag: flag,
				deleteItem: deleteItem,
			},
			success: function(data){
				location.reload();
				console.log(data);
			},
			error: function(data){
				console.log(data);
			}
		});
	}
		
	function cleanCart(){
		$.ajax({
			type: "GET",
			url: '{{asset('clean_cart')}}',
			success: function(data){
				location.reload();
			},
			error: function(data){
				console.log(data);
			}
		});
	}
/*******************************************************************/	
	</script>

@endsection