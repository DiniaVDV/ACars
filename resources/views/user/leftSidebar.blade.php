<div class="container">
	<div class="row">
		<div class="col-sm-3 col-md-3 col-lg-3">
			<div class="leftSidebar">
				<h3>Мой кабинет</h3>
				<ul class="nav nav-pills nav-stacked userProfile">
					<li role="presentation"
						@if( Route::getCurrentRoute()->uri() == 'user/{name}/edit/own_info')
													class="active"
						@endif>
						<a href="{{asset('user'). '/' . Auth::user()->name.'/edit/own_info'}}">Редактировать личные данные</a>
					</li>	
					<li role="presentation" 
						@if( Route::getCurrentRoute()->uri() == 'user/{name}/order_history')
													class="active"
						@endif>					
						<a href="{{asset('user'). '/' . Auth::user()->name.'/order_history'}}">История заказов</a>
					</li>	
					<li role="presentation">
						<a href="{{asset('user'). '/' . Auth::user()->name.'/my_comments'}}">Мои отзывы</a>
					</li>	
					<li role="presentation">
						<a href="{{asset('shopping_cart')}}">Корзина</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 content">