@extends('layouts.appWithoutSidebar')

@section('content')
	@if(Auth::user())
		<div class="raw">
			<div class="col-sm-6 col-md-4 col-sm-offset-2 col-md-offset-3 ">	
			<h2>Оформление заказа</h2>
				<h4>Общая сумма: {{ceil(Cart::total())}} грн.</h4>
				
				<form action="{{asset('checkout')}}" method="post" id="checkout">					
					{{csrf_field()}}
					<div class="form-group{{ $errors->has('typeOfDelivery') ? ' has-error' : '' }}">
						<label for="typeOfDelivery">Способ доставки:</label>
						<select class="form-control" id="typeOfDelivery" name="typeOfDelivery">
							<option></option>
							<option value="1">Самовывоз</option>
							<option value="2">Курьером</option>
							<option value="3">Новой почтой</option>
						</select>
						@if ($errors->has('typeOfDelivery'))
							<span class="help-block">
							<strong>{{ $errors->first('typeOfDelivery') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group{{ $errors->has('typeOfPayment') ? ' has-error' : '' }}">
						<label for="typeOfPayment">Способ оплаты:</label>
						<select class="form-control" id="typeOfPayment" name="typeOfPayment">
							<option></option>
							<option value="1">Наличными</option>
							<option value="2">Картой</option>
						</select>
						@if ($errors->has('typeOfPayment'))
							<span class="help-block">
							<strong>{{ $errors->first('typeOfPayment') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label>Адрес доставки</label>
						<div class="checkbox">
							<label>
								<input type="checkbox" id="oldAddress" name="checkOldAddress" {{!empty($userAddress) ? 'checked=checked' : ''}} class="oldAddress">{{!empty($userAddress) ? $userAddress . '.': 'У нас нету Вашего адреса'}}
							</label>
						</div>
						<div class="form-group">
							<label for="city">Город:</label>
							<input type="text" id="city" name="city" value="" class="form-control" disabled>
						</div>
						<div class="form-group">
							<label for="street">Улица:</label>
							<input type="text" id="street" name="street" class="form-control" value="" disabled/>
						</div>
						<div class="form-group">
							<label for="house_number">Номер дома:</label>
							<input type="text" id="house_number" name="house_number" class="form-control" value="" disabled/>
						</div>
						<div class="form-group">
							<label for="flat_number">Номер квартиры:</label>
							<input type="text" id="flat_number" name="flat_number" class="form-control" value="" disabled/>
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
    if(!$('#oldAddress').checked){
        $('#city').prop('disabled', true);
        $('#street').prop('disabled', true);
        $('#house_number').prop('disabled', true);
        $('#flat_number').prop('disabled', true);
    }
    if($('#oldAddress').checked){
        $('#city').prop('disabled', false);
        $('#street').prop('disabled', false);
        $('#house_number').prop('disabled', false);
        $('#flat_number').prop('disabled', false);
    }
$('#oldAddress').change(function(){
	if(this.checked){
		$('#city').prop('disabled', true);
		$('#street').prop('disabled', true);
		$('#house_number').prop('disabled', true);
		$('#flat_number').prop('disabled', true);
	}
	if(!this.checked){
        $('#city').prop('disabled', false);
        $('#street').prop('disabled', false);
        $('#house_number').prop('disabled', false);
        $('#flat_number').prop('disabled', false);
	}
});

</script>
@endsection