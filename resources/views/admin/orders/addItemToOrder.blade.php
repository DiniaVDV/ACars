@extends('admin.app')
@section('content')
    <h3>Добавить товар к заказу №{{$orderId}}</h3><br/>
    <br/>
    {!! Form::open( ['method' => 'POST',  'action' => ['Admin\OrdersController@postAddItemToOrder', $orderId]]) !!}
        <div class="form-group">
            {!! Form::label('item', 'Выберите товар:') !!}
            {!! Form::select('item', $nameItems, null, ['class' => 'form-control', 'placeholder' => 'Выберите товар']) !!}
        </div>
    <div class="form-group">
        {!! Form::label('qty', 'Количество:') !!}
        {!! Form::text('qty', null, ['class' => 'form-control']) !!}
    </div>

        <div class="form-group">
            {!! Form::submit('Добавить товар', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    {!! Form::close() !!}
    @include('errors.list')
@endsection