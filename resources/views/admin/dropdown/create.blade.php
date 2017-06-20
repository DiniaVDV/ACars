@extends('admin.app')
@section('content')
    <h3>Разместить пункт меню</h3><br/>
    <br/>

    {!! Form::open(['action' => 'Admin\DropdownController@store']) !!}
    @include('admin.dropdown.form', ['submitButtonText' => 'Создать пункт меню'])
    {!! Form::close() !!}
    @include('errors.list')
@endsection