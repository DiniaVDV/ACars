<!-- Carousel
================================================== -->

<div id="myCarousel" class="carousel slide hidden-xs" data-ride="carousel">
    <!-- Indicators -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="container">
                <div class="row carousel-caption">
                    @for($i = 0; $i < 3; $i++)
                        <div class="hidden-sm col-md-4 col-lg-4 itemBasic">
							<div class="panel panel-default oneItem">								
								<div class="panel-heading itemHead">
									<a class="aboutItem" href="{{asset('/select')}}/{{$itemsBrans['items'][$i]->alias}}_{{$itemsBrans['items'][$i]->code}}">
										<h4 class="title">{{$itemsBrans['items'][$i]->name}} {{$itemsBrans['items'][$i]->code}} {{$itemsBrans['brands'][$itemsBrans['items'][$i]->id][0]->name}}</h4>
										<img class="itemLogo" src="{{ asset('img/items')}}/{{$itemsBrans['items'][$i]->img}} ">
									</a>
								</div>
								<div class="panel-body">
									<p class="priceMain"><strong>{{ceil($itemsBrans['items'][$i]->price * 1.2)}} грн </strong></p>
									<button type="submit" class="btn buyMain" onclick="addToCart({{$itemsBrans['items'][$i]->id}})">
										Купить
									</button>
								</div>
							</div>	
                        </div>
						@if($i < 2)
							<div class="col-sm-6 hidden-md hidden-lg itemBasic">
								<div class="panel panel-default oneItem">								
									<div class="panel-heading itemHead">
										<a class="aboutItem" href="{{asset('/select')}}/{{$itemsBrans['items'][$i]->alias}}_{{$itemsBrans['items'][$i]->code}}">
											<h4 class="title">{{$itemsBrans['items'][$i]->name}} {{$itemsBrans['items'][$i]->code}} {{$itemsBrans['brands'][$itemsBrans['items'][$i]->id][0]->name}}</h4>
											<img class="itemLogo" src="{{ asset('img/items')}}/{{$itemsBrans['items'][$i]->img}} ">
										</a>
									</div>
									<div class="panel-body">
										<p class="priceMain"><strong>{{ceil($itemsBrans['items'][$i]->price * 1.2)}} грн </strong></p>
										<button type="submit" class="btn buyMain" onclick="addToCart({{$itemsBrans['items'][$i]->id}})">
											Купить
										</button>
									</div>
								</div>	
							</div>
						@endif
                    @endfor
                </div>
            </div>
        </div>
        <div class="item">
            <div class="container">
                <div class="row carousel-caption">
                    @for($i = 3; $i < 6; $i++)
                        <div class="hidden-sm col-md-4 col-lg-4 itemBasic">
							<div class="panel panel-default oneItem">								
								<div class="panel-heading itemHead">
									<a class="aboutItem" href="{{asset('/select')}}/{{$itemsBrans['items'][$i]->alias}}_{{$itemsBrans['items'][$i]->code}}">
										<h4 class="title">{{$itemsBrans['items'][$i]->name}} {{$itemsBrans['items'][$i]->code}} {{$itemsBrans['brands'][$itemsBrans['items'][$i]->id][0]->name}}</h4>
										<img class="itemLogo" src="{{ asset('img/items')}}/{{$itemsBrans['items'][$i]->img}} ">
									</a>
								</div>
								<div class="panel-body">
									<p class="priceMain"><strong>{{ceil($itemsBrans['items'][$i]->price * 1.2)}} грн </strong></p>
									<button type="submit" class="btn buyMain" onclick="addToCart({{$itemsBrans['items'][$i]->id}})">
										Купить
									</button>
								</div>
							</div>	
                        </div>
						@if($i < 5)
							<div class="col-sm-6 hidden-md hidden-lg itemBasic">
								<div class="panel panel-default oneItem">								
									<div class="panel-heading itemHead">
										<a class="aboutItem" href="{{asset('/select')}}/{{$itemsBrans['items'][$i]->alias}}_{{$itemsBrans['items'][$i]->code}}">
											<h4 class="title">{{$itemsBrans['items'][$i]->name}} {{$itemsBrans['items'][$i]->code}} {{$itemsBrans['brands'][$itemsBrans['items'][$i]->id][0]->name}}</h4>
											<img class="itemLogo" src="{{ asset('img/items')}}/{{$itemsBrans['items'][$i]->img}} ">
										</a>
									</div>
									<div class="panel-body">
										<p class="priceMain"><strong>{{ceil($itemsBrans['items'][$i]->price * 1.2)}} грн </strong></p>
										<button type="submit" class="btn buyMain" onclick="addToCart({{$itemsBrans['items'][$i]->id}})">
											Купить
										</button>
									</div>
								</div>	
							</div>
						@endif
                    @endfor
                </div>
            </div>
        </div>
        <div class="item">
            <div class="container">
                <div class="row carousel-caption">
                    @for($i = 6; $i < 9; $i++)
                        <div class="hidden-sm col-md-4 col-lg-4 itemBasic">
							<div class="panel panel-default oneItem">								
								<div class="panel-heading itemHead">
									<a class="aboutItem" href="{{asset('/select')}}/{{$itemsBrans['items'][$i]->alias}}_{{$itemsBrans['items'][$i]->code}}">
										<h4 class="title">{{$itemsBrans['items'][$i]->name}} {{$itemsBrans['items'][$i]->code}} {{$itemsBrans['brands'][$itemsBrans['items'][$i]->id][0]->name}}</h4>
										<img class="itemLogo" src="{{ asset('img/items')}}/{{$itemsBrans['items'][$i]->img}} ">
									</a>
								</div>
								<div class="panel-body">
									<p class="priceMain"><strong>{{ceil($itemsBrans['items'][$i]->price * 1.2)}} грн </strong></p>
									<button type="submit" class="btn buyMain" onclick="addToCart({{$itemsBrans['items'][$i]->id}})">
										Купить
									</button>
								</div>
							</div>	
                        </div>
						@if($i < 8)
							<div class="col-sm-6 hidden-md hidden-lg itemBasic">
								<div class="panel panel-default oneItem">								
									<div class="panel-heading itemHead">
										<a class="aboutItem" href="{{asset('/select')}}/{{$itemsBrans['items'][$i]->alias}}_{{$itemsBrans['items'][$i]->code}}">
											<h4 class="title">{{$itemsBrans['items'][$i]->name}} {{$itemsBrans['items'][$i]->code}} {{$itemsBrans['brands'][$itemsBrans['items'][$i]->id][0]->name}}</h4>
											<img class="itemLogo" src="{{ asset('img/items')}}/{{$itemsBrans['items'][$i]->img}} ">
										</a>
									</div>
									<div class="panel-body">
										<p class="priceMain"><strong>{{ceil($itemsBrans['items'][$i]->price * 1.2)}} грн </strong></p>
										<button type="submit" class="btn buyMain" onclick="addToCart({{$itemsBrans['items'][$i]->id}})">
											Купить
										</button>
									</div>
								</div>	
							</div>
						@endif
                    @endfor
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div><!-- /.carousel -->




<div id="myCarousel2" class="carousel slide hidden-xs" data-ride="carousel">
    <!-- Indicators -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="container">
                <div class="row carousel-caption">
                    @for($i = 9; $i < 12; $i++)
                        <div class="hidden-sm col-md-4 col-lg-4 itemBasic">
							<div class="panel panel-default oneItem">								
								<div class="panel-heading itemHead">
									<a class="aboutItem" href="{{asset('/select')}}/{{$itemsBrans['items'][$i]->alias}}_{{$itemsBrans['items'][$i]->code}}">
										<h4 class="title">{{$itemsBrans['items'][$i]->name}} {{$itemsBrans['items'][$i]->code}} {{$itemsBrans['brands'][$itemsBrans['items'][$i]->id][0]->name}}</h4>
										<img class="itemLogo" src="{{ asset('img/items')}}/{{$itemsBrans['items'][$i]->img}} ">
									</a>
								</div>
								<div class="panel-body">
									<p class="priceMain"><strong>{{ceil($itemsBrans['items'][$i]->price * 1.2)}} грн </strong></p>
									<button type="submit" class="btn buyMain" onclick="addToCart({{$itemsBrans['items'][$i]->id}})">
										Купить
									</button>
								</div>
							</div>	
                        </div>
						@if($i < 11)
							<div class="col-sm-6 hidden-md hidden-lg itemBasic">
								<div class="panel panel-default oneItem">								
									<div class="panel-heading itemHead">
										<a class="aboutItem" href="{{asset('/select')}}/{{$itemsBrans['items'][$i]->alias}}_{{$itemsBrans['items'][$i]->code}}">
											<h4 class="title">{{$itemsBrans['items'][$i]->name}} {{$itemsBrans['items'][$i]->code}} {{$itemsBrans['brands'][$itemsBrans['items'][$i]->id][0]->name}}</h4>
											<img class="itemLogo" src="{{ asset('img/items')}}/{{$itemsBrans['items'][$i]->img}} ">
										</a>
									</div>
									<div class="panel-body">
										<p class="priceMain"><strong>{{ceil($itemsBrans['items'][$i]->price * 1.2)}} грн </strong></p>
										<button type="submit" class="btn buyMain" onclick="addToCart({{$itemsBrans['items'][$i]->id}})">
											Купить
										</button>
									</div>
								</div>	
							</div>
						@endif
                    @endfor
                </div>
            </div>
        </div>
        <div class="item">
            <div class="container">
                <div class="row carousel-caption">
                    @for($i = 12; $i < 15; $i++)
                        <div class="hidden-sm col-md-4 col-lg-4 itemBasic">
							<div class="panel panel-default oneItem">								
								<div class="panel-heading itemHead">
									<a class="aboutItem" href="{{asset('/select')}}/{{$itemsBrans['items'][$i]->alias}}_{{$itemsBrans['items'][$i]->code}}">
										<h4 class="title">{{$itemsBrans['items'][$i]->name}} {{$itemsBrans['items'][$i]->code}} {{$itemsBrans['brands'][$itemsBrans['items'][$i]->id][0]->name}}</h4>
										<img class="itemLogo" src="{{ asset('img/items')}}/{{$itemsBrans['items'][$i]->img}} ">
									</a>
								</div>
								<div class="panel-body">
									<p class="priceMain"><strong>{{ceil($itemsBrans['items'][$i]->price * 1.2)}} грн </strong></p>
									<button type="submit" class="btn buyMain" onclick="addToCart({{$itemsBrans['items'][$i]->id}})">
										Купить
									</button>
								</div>
							</div>	
                        </div>
						@if($i < 14)
							<div class="col-sm-6 hidden-md hidden-lg itemBasic">
								<div class="panel panel-default oneItem">								
									<div class="panel-heading itemHead">
										<a class="aboutItem" href="{{asset('/select')}}/{{$itemsBrans['items'][$i]->alias}}_{{$itemsBrans['items'][$i]->code}}">
											<h4 class="title">{{$itemsBrans['items'][$i]->name}} {{$itemsBrans['items'][$i]->code}} {{$itemsBrans['brands'][$itemsBrans['items'][$i]->id][0]->name}}</h4>
											<img class="itemLogo" src="{{ asset('img/items')}}/{{$itemsBrans['items'][$i]->img}} ">
										</a>
									</div>
									<div class="panel-body">
										<p class="priceMain"><strong>{{ceil($itemsBrans['items'][$i]->price * 1.2)}} грн </strong></p>
										<button type="submit" class="btn buyMain" onclick="addToCart({{$itemsBrans['items'][$i]->id}})">
											Купить
										</button>
									</div>
								</div>	
							</div>
						@endif
                    @endfor

                </div>
            </div>
        </div>
        <div class="item">
            <div class="container">
                <div class="row carousel-caption">
                    @for($i = 15; $i < 18; $i++)
                        <div class="hidden-sm col-md-4 col-lg-4 itemBasic">
							<div class="panel panel-default oneItem">								
								<div class="panel-heading itemHead">
									<a class="aboutItem" href="{{asset('/select')}}/{{$itemsBrans['items'][$i]->alias}}_{{$itemsBrans['items'][$i]->code}}">
										<h4 class="title">{{$itemsBrans['items'][$i]->name}} {{$itemsBrans['items'][$i]->code}} {{$itemsBrans['brands'][$itemsBrans['items'][$i]->id][0]->name}}</h4>
										<img class="itemLogo" src="{{ asset('img/items')}}/{{$itemsBrans['items'][$i]->img}} ">
									</a>
								</div>
								<div class="panel-body">
									<p class="priceMain"><strong>{{ceil($itemsBrans['items'][$i]->price * 1.2)}} грн </strong></p>
									<button type="submit" class="btn buyMain" onclick="addToCart({{$itemsBrans['items'][$i]->id}})">
										Купить
									</button>
								</div>
							</div>	
                        </div>
						@if($i < 17)
							<div class="col-sm-6 hidden-md hidden-lg itemBasic">
								<div class="panel panel-default oneItem">								
									<div class="panel-heading itemHead">
										<a class="aboutItem" href="{{asset('/select')}}/{{$itemsBrans['items'][$i]->alias}}_{{$itemsBrans['items'][$i]->code}}">
											<h4 class="title">{{$itemsBrans['items'][$i]->name}} {{$itemsBrans['items'][$i]->code}} {{$itemsBrans['brands'][$itemsBrans['items'][$i]->id][0]->name}}</h4>
											<img class="itemLogo" src="{{ asset('img/items')}}/{{$itemsBrans['items'][$i]->img}} ">
										</a>
									</div>
									<div class="panel-body">
										<p class="priceMain"><strong>{{ceil($itemsBrans['items'][$i]->price * 1.2)}} грн </strong></p>
										<button type="submit" class="btn buyMain" onclick="addToCart({{$itemsBrans['items'][$i]->id}})">
											Купить
										</button>
									</div>
								</div>	
							</div>
						@endif
                    @endfor

                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel2" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel2" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div><!-- /.carousel -->
