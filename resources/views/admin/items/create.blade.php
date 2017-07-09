@extends('admin.app')
@section('content')
    <h3> категории</h3><br/>
    <br/>
    {!! Form::open(['action' => 'Admin\ItemsController@store']) !!}
		@include('admin.items.form', ['submitButtonText' => 'Добавить товар'])
    {!! Form::close() !!}
    @include('errors.list')
@endsection