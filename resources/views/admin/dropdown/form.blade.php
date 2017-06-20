<div class="form-group">
    {!! Form::label('title', 'Название:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">
    {!! Form::label('alias', 'Псевдоним:') !!}
    {!! Form::text('alias', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">
    {!! Form::label('for_unreg_users', 'Пункт для незарегистированых пользователей:') !!}
    {!! Form::select('for_unreg_users', ['false' => 'Нет', 'true' => 'Да'],  null, ['id' => 'for_unreg_users', 'class' => 'form-control']) !!}

</div>

<div class="form-group">
    {!! Form::label('for_reg_users', 'Пункт для зарегистированых пользователей:') !!}
    {!! Form::select('for_reg_users', ['false' => 'Нет', 'true' => 'Да'],  null, ['id' => 'for_reg_users', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('for_moderator', 'Пункт для модератора:') !!}
    {!! Form::select('for_moderator', ['false' => 'Нет', 'true' => 'Да'],  null, ['id' => 'for_moderator', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('for_admin', 'Пункт для админа:') !!}
    {!! Form::select('for_admin', ['false' => 'Нет', 'true' => 'Да'],  null, ['id' => 'for_admin', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('position', 'Позиция в меню:') !!}
    {!! Form::text('position', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>