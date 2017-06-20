@extends('admin.app')
@section('content')
    <h3> категории</h3><br/>
    <br/>
    {!! Form::open(['action' => 'Admin\CategoryController@store']) !!}
		@include('admin.categories.form', ['submitButtonText' => 'Добавить категорию'])
    {!! Form::close() !!}
    @include('errors.list')
@endsection