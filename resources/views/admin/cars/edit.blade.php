@extends('admin.app')
@section('content')

<h3>Редактирования данных о автомобиле {{strtolower($car->alias)}}:</h3><br/>
<br/>
    {!! Form::model($car, ['method' => 'PATCH', 'action' => ['Admin\CarsController@update', $car->id]]) !!}
		@include('admin.cars.form', ['submitButtonText' => 'Обновить автомобиль'])
    {!! Form::close() !!}
	@include('errors.list')
@endsection