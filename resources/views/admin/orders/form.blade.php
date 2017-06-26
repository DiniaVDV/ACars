
<div class="form-group">
    {!! Form::label('name', 'Номер заказа:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('logo', 'Имя пользователя:') !!}
    {!! Form::text('logo', null, ['class' => 'form-control']) !!}
	{!! Form::file('logo',['class' => 'form-control'])!!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Способ доставки:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('country', 'Способ оплати:') !!}
    {!! Form::text('country', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('country', 'Статус:') !!}
    {!! Form::text('country', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('country', 'Способ оплати:') !!}
    {!! Form::text('country', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>