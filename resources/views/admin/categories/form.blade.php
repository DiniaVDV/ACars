
<div class="form-group">
    {!! Form::label('title', 'Название:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('category_name', 'Псевдоним:') !!}
    {!! Form::text('category_name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('has_child', 'Наличие подпунктов:') !!}
    {!! Form::select('has_child', array('0' => 'Нет', '1' => 'Да'),  null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('parent_id', 'Входит в категорию:') !!}
    {!! Form::select('parent_id', $categories, !empty($category) ? $category->parent_id : null, ['class' => 'form-control parent_id', 'placeholder' => 'Выберите категорию']) !!}
</div>

<div class="form-group">
    {!! Form::label('parent_id_2', 'Входит в еще одну категорию:') !!}
    {!! Form::select('parent_id_2', $categories, isset($category->parent_id_2) ? $category->parent_id_2 : null, [ 'class' => 'form-control  parent_id', 'placeholder' => 'Выберите категорию']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Описание:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>