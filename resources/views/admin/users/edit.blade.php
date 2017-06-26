
@extends('admin.app')
@section('content')
    <h3>Редактировать данные пользователя</h3><br/>

    <br/>
    {!! Form::model($user, ['method' => 'PATCH', 'action' => ['Admin\UserController@update', $user->id]]) !!}
    @include('admin.users.form', ['submitButtonText' => 'Обновить'])
    {!! Form::close() !!}
    @include('errors.list')
@endsection