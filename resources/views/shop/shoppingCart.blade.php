@extends('layouts.appWithoutSidebar')

@section('content')
    @if(Cart::count() == null)
        <h2>Ваша корзина пуста!</h2>
    @else
		
        <div class="raw">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group shopCart">
					<li class="list-group-item">
						 <h2>Корзина:</h2>
					</li>
                    @foreach($cart as $item)
                        <li class="list-group-item">
                            <span class="badge">{{$item->qty}}</span>
                            <strong>{{$item->name}}</strong>
                            <span class="label label-success">{{$item->price}}</span>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-xs dropdown-toogle" data-toggle="dropdown">Действие <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Добавить 1 товар</a></li>
                                    <li><a href="#">Удалить товар</a></li>
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
        <div class="raw">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
               <strong>Итого: {{Cart::total()}}</strong>
            </div>
        </div>

        <div class="raw">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
               <a href="{{asset('checkout')}}" type="button" class="btn btn-success">CheachOut</a>
            </div>
        </div>
    @endif
@endsection