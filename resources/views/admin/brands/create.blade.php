@extends('admin.app')
@section('content')
    <h3>Бренд</h3><br/>
    <br/>
    {!! Form::open(['action' => 'Admin\BrandController@store']) !!}
		@include('admin.brands.form', ['submitButtonText' => 'Добавить бренд'])
    {!! Form::close() !!}
    @include('errors.list')
@endsection