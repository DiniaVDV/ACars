<div class="form-group">
    {!! Form::label('message', 'Отзыв:') !!}
    {!! Form::text('message', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('created_at', 'Был создан:') !!}
    {!! Form::input('date', 'created_at', date('Y-m-d'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitText, ['class' => 'btn btn-primary form-control']) !!}
</div>