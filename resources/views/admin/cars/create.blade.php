@extends('admin.app')
@section('content')
    <h3>Добавить данные о новом автомобиле</h3><br/>
    <br/>
    {!! Form::open(['action' => 'Admin\CarsController@store']) !!}
		@include('admin.cars.form', ['submitButtonText' => 'Добавить автомобиль'])
    {!! Form::close() !!}
    @include('errors.list')
@endsection