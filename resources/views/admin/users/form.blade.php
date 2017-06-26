<div class="form-group">
    {!! Form::label('name', 'Имя пользователя:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('role_list', 'Роли:') !!}
    {!! Form::select('role_list[]', $roles, isset($user) ? $user->role_list : null, ['id' => 'role_list', 'class' => 'form-control', 'multiple']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>