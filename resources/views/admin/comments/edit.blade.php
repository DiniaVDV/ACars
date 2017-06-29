@extends('admin.app')
@section('content')

<h3>Редактирование отзыв, {{$user[0]->name}}, которий был размещен под товаром - {{$item[0]->title}}:</h3><br/>
    {!! Form::model($comment, ['method' => 'PATCH', 'action' => ['Admin\CommentsController@update', $comment->id]]) !!}
        @include('admin.comments.form', ['submitText' =>'Обновить отзыв'])
    {!! Form::close() !!}
    @include('errors.list')

@endsection