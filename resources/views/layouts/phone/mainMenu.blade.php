<div class="container forMobile">
	<div class="navbar navbar-default navbar-static-top visible-xs mobileNavbar">
		<div class="navbar-header">
			<button id="buttonMenu" type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">	
				<span class="icon-bar smenu"></span>
				<span class="icon-bar smenu"></span>
				<span class="icon-bar smenu"></span>
			</button>
			
			 <button class="btn btn-default btn-md" type="button" id="buttonMenu" onclick="show('block')">
				<span class="glyphicon glyphicon-th-large smenu" aria-hidden="true"></span>
			</button>
			<div id="wrap" onclick="show('none')"></div>
			<div id="window">

					<ul id="selectCarMenu">
						<li><h4>Подбор по модели авто</h4></li>
						<li>	
							<p>Выберите марку:</p>
							<select class="form-control input-sm brands" onchange="getYears(this)">
							</select>
						</li>
						<li>				
							<p>Выберите год:</p>
							<select class="form-control input-sm years" style="border-radius: 5px;" onchange="getModels(this)">
							</select>
						</li>
						<li>				
							<p>Выберите модель:</p>
							<select class="form-control input-sm models" style="border-radius: 5px;" onchange="getEngines(this)">
							</select>
						</li>
						<li>				
							<p>Выберите двигатель:</p>
							<select class="form-control input-sm engines" style="border-radius: 5px;" onchange="chosenCar(this)">
								<option></option>
							</select>
						</li>
					</ul>

			</div>
		</div>

		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
								@foreach($navbar as $element)
						@if($element->for_reg_users == 'true' && $element->for_unreg_users == 'true' )
									<li 
										@if( Route::getCurrentRoute()->uri() == $element->alias)
													class="active pull-{{$element->placing}}?>"
										@endif>
											 <a href="{{asset($element->alias)}}"> {{$element->title}} </a>
									</li>	
							@elseif(Auth::guest())
									@if($element->for_unreg_users == 'true' && $element->for_reg_users == 'false')
										<li 
											@if( Route::getCurrentRoute()->uri() == $element->alias)
														class="active" 
											@endif>
												 <a href="{{asset($element->alias)}}"> {{$element->title}} </a>
										</li>	
								@endif
							@endif
					@endforeach
						<li>
							<a href="{{asset('shopping_cart')}}">
								<i class="fa fa-shopping-basket" aria-hidden="true"></i>
								<span class="badge" id="totalQty">{{Cart::count()}}</span>
							</a>
						</li>
					@if(Auth::user())
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								<i class="fa fa-user" aria-hidden="true"></i>{{ Auth::user()->name }} <span class="caret"></span>
							</a>	
							<ul class="dropdown-menu" role="menu">
							@foreach($navbar as $element)
										   @if($element->dropdown_menu == 'true')
											   <li><a href="{{$element->alias}}">{{$element->title}}</a></li>	
											@endif
							@endforeach
								<li role="separator" class="divider"></li>
								<li>										  
									<a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выйти</a>
									<form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
										{{ csrf_field() }}
									</form>
								</li>
							</ul>
						</li>
					@endif
			</ul>
		</div>
	</div>
</div>
