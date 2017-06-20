@extends('admin.app')
@section('content')

<h3>Редактирование товара {{strtolower($item->name)}}:</h3><br/>
<br/>
    {!! Form::model($item, ['method' => 'PATCH', 'action' => ['Admin\ItemsController@update', $item->id]]) !!}
		@include('admin.items.form', ['submitButtonText' => 'Обновить товар'])
    {!! Form::close() !!}
	@include('errors.list')
@endsection