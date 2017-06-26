@extends('admin.app')
@section('content')
    <h3>Добавить пользователя</h3><br/>
    <br/>

    {!! Form::open(['action' => 'Admin\UserController@store']) !!}
        @include('admin.users.form', ['submitButtonText' => 'Добавить пользователя'])
    {!! Form::close() !!}
    @include('errors.list')
@endsection