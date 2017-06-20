@extends('admin.app')
@section('content')
    <h3>Разместить комментарий</h3><br/>
    <br/>

    {!! Form::open(['action' => 'Admin\CommentsController@store']) !!}

    <div class="form-group">
        {!! Form::label('message', 'Комментарий:') !!}
        {!! Form::text('message', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('status', 'Статус:') !!}
        {!! Form::select('status', ['published' => 'Опубликовано', 'check' => 'Ожидается'],  null, ['id' => 'status', 'class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('article_id', 'Статья:') !!}
        {!! Form::select('article_id', $articles, null, ['id' => 'article_title', 'class' => 'form-control']) !!}
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