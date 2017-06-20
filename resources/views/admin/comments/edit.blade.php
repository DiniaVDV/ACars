@extends('admin.app')
@section('content')

<h3>Редактирование комментарий, {{$user[0]->name}}, которий был размещен под статьей - {{$article[0]->title}}:</h3><br/>
    {!! Form::model($comment, ['method' => 'PATCH', 'action' => ['Admin\CommentsController@update', $comment->id]]) !!}
            <div class="form-group">
                {!! Form::label('message', 'Комментарий:') !!}
                {!! Form::text('message', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('status', 'Статус:') !!}
                {!! Form::select('status', ['published' => 'Опубликовано', 'check' => 'Ожидается'],  null, ['id' => 'status', 'class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('created_at', 'Был создан:') !!}
                {!! Form::input('date', 'created_at', date('Y-m-d'), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('published_at', 'Был опубликован:') !!}
                {!! Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Обновить комментарий', ['class' => 'btn btn-primary form-control']) !!}
            </div>
    {!! Form::close() !!}
    @include('errors.list')

@endsection