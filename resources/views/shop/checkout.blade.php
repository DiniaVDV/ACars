@extends('layouts.appWithoutSidebar')

@section('content')
	@if(Auth::user())
		<div class="raw">
			<div class="col-sm-6 col-md-4 col-sm-offset-2 col-md-offset-3 ">	
			<h2>Оформление заказа</h2>
				<h4>Общая сумма: {{ceil(Cart::total())}} грн.</h4>
				
				<form action="{{asset('checkout')}}" method="post" id="checkout">					
					{{csrf_field()}}
					<div class="form-group">
						<label for="typeOfDelivery">Способ доставки:</label>
						<select class="form-control" id="typeOfDelivery" name="typeOfDelivery">
							<option></option>
							<option value="1">Самовывоз</option>
							<option value="2">Курьером</option>
							<option value="3">Новой почтой</option>
						</select>
					</div>
					<div class="form-group">
						<label for="typeOfPayment">Способ оплаты:</label>
						<select class="form-control" id="typeOfPayment" name="typeOfPayment">
							<option></option>
							<option value="1">Наличными</option>
							<option value="2">Картой</option>
						</select>
					</div>
					<div class="form-group">
						<label>Адрес доставки</label>
						<div class="checkbox">
							<label>
								<input type="checkbox" id="oldAddress" name="checkOldAddress" class="oldAddress">{{!empty($aboutUser) ? $aboutUser->city . ', ' . $aboutUser->street . ', ' .  $aboutUser->house_number . ', ' . $aboutUser->flat_number . '.': 'У нас нету Вашего адреса'}}
							</label>
						</div>
						<div class="form-group">
							<label for="city">Город:</label>
							<input type="text" id="city" name="city" value="" class="form-control">
						</div>
						<div class="form-group">
							<label for="street">Улица:</label>
							<input type="text" id="street" name="street" class="form-control" value=""/>
						</div>
						<div class="form-group">
							<label for="house_number">Номер дома:</label>
							<input type="text" id="house_number" name="house_number" class="form-control" value=""/>
						</div>
						<div class="form-group">
							<label for="flat_number">Номер квартиры:</label>
							<input type="text" id="flat_number" name="flat_number" class="form-control" value=""/>
						</div>
						<div class="form-group">
							<label for="comment">Комментарий:</label>
							<textarea id="comment" name="comment" class="form-control" rows="4"></textarea>
						</div>						
					</div>
					<button class="btn btn-success">Заказ подтверждаю</button>
				</form>
			</div>
		</div>
			@elseif(Auth::guest())
				<div class="col-sm-6 col-md-6 col-lg-6 ">
					@include('auth.registerForm')
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6 ">
					@include('auth.loginForm')
				</div>			
			@endif
<script>
$(function(){
	if($('#oldAddress').val() == "1"){
		$('#oldAddress').attr("checked", true);

	}
});

$('#oldAddress').change(function(){
	alert(3);
	if(this.checked){
		alert(1);
	}
	if(!this.checked){
		alert(2);
	}
});
$('.oldAddress').change(function(){
	alert(4);
});
</script>
@endsection