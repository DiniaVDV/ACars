@extends('layouts.appWithoutSidebar')

@section('content')
	@if(Auth::user())
		<div class="raw">
			<div class="col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 ">	
			<h2>Оформление заказа</h2>
				<h4>Your total: {{Cart::total()}}</h4>
				
				<form action="{{asset('checkout')}}" method="post" id="payment-form">					
					{{csrf_token()}}
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

@endsection