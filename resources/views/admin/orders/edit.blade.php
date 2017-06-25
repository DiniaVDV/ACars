@extends('admin.app')
@section('content')

<h3>Редактирование данных о {{$brand->name}}:</h3><br/>
<br/>
    {!! Form::model($brand, ['method' => 'PATCH', 'action' => ['Admin\BrandController@update', $brand->id]]) !!}
		@include('admin.brands.form', ['submitButtonText' => 'Обновить бренд'])
    {!! Form::close() !!}
	@include('errors.list')
@endsection