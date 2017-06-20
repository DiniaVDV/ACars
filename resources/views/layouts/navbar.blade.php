<div class="container">
	<div class="row">
		<div class="col-md-12 col-lg-12">	
			<nav class="navbar hidden-xs">
				<ul class="nav nav-pills">
					@foreach($navbar as $element)
						@if($element->for_reg_users == 'true' && $element->for_unreg_users == 'true' )
									<li role="presentation" 
										@if( Route::getCurrentRoute()->uri() == $element->alias)
													class="active pull-{{$element->placing}}?>"
										@else
													class="pull-{{$element->placing}}"
										@endif>
											 <a href="{{asset($element->alias)}}"> {{$element->title}} </a>
									</li>	
							@elseif(Auth::guest())
									@if($element->for_unreg_users == 'true' && $element->for_reg_users == 'false')
										<li role="presentation" 
											@if( Route::getCurrentRoute()->uri() == $element->alias)
														class="active pull-{{$element->placing}}"
											@else
														class="pull-{{$element->placing}}" 
											@endif>
												 <a href="{{asset($element->alias)}}"> {{$element->title}} </a>
										</li>	
								@endif
							@endif
					@endforeach
						<li class="pull-right" role="presentation">
							<a href="{{asset('shopping_cart')}}">
								<i class="fa fa-shopping-basket" aria-hidden="true"></i>
								<span class="badge" id="totalQty">{{Cart::count()}}</span>
							</a>
						</li>
					@if(Auth::user())
						<li class="dropdown pull-right">
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
			</nav>
		</div>
	</div>
</div>
		