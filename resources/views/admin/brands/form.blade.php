
<div class="form-group">
    {!! Form::label('name', 'Название:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('logo', 'Псевдоним:') !!}
    {!! Form::text('logo', null, ['class' => 'form-control']) !!}
	{!! Form::file('logo',['class' => 'form-control'])!!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Описание:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('country', 'Страна изготовления:') !!}
    {!! Form::text('country', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>