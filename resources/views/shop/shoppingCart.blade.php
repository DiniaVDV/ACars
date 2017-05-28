@extends('layouts.appWithoutSidebar')

@section('content')
    @if(Cart::count() == null)
        <h2>Ваша корзина пуста!</h2>
    @else
        <div class="raw">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                    @foreach($cart as $item)
                        <li class="list-group-item">
                            <span class="badge">{{$item->qty}}</span>
                            <strong>{{$item->name}}</strong>
                            <span class="label label-success">{{$item->price}}</span>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-xs dropdown-toogle" data-toggle="dropdown">Action <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Reduce by 1</a></li>
                                    <li><a href="#">Reduce all</a></li>
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
        <div class="raw">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
               <strong>Total: {{Cart::total()}}</strong>
            </div>
        </div>
        <hr>
        <div class="raw">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
               <a href="{{asset('checkout')}}" type="button" class="btn btn-success">CheachOut</a>
            </div>
        </div>
    @endif
@endsection