


@extends('admin.app')
@section('content')
    <h3>Редактировать пункт меню</h3><br/>

    <br/>
    {!! Form::model($dropdown[0], ['method' => 'PATCH', 'action' => ['Admin\DropdownController@update', $dropdown[0]->id]]) !!}
    @include('admin.dropdown.form', ['submitButtonText' => 'Обновить пункт меню'])
    {!! Form::close() !!}
    @include('errors.list')
@endsection