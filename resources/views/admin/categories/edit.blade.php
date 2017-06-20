@extends('admin.app')
@section('content')

<h3>Редактирование категории {{strtolower($category->title)}}:</h3><br/>
<br/>
    {!! Form::model($category, ['method' => 'PATCH', 'action' => ['Admin\CategoryController@update', $category->id]]) !!}
		@include('admin.categories.form', ['submitButtonText' => 'Обновить категорию'])
    {!! Form::close() !!}
	@include('errors.list')
@endsection