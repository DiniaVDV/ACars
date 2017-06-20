
<div class="form-group">
    {!! Form::label('name', 'Название:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('brand_id', 'Бренд:') !!}
    {!! Form::select('brand_id', $brands, !empty($item->brand_id) ? $item->brand_id : null, ['class' => 'form-control', 'placeholder' => 'Выберите бренд']) !!}
</div>

<div class="form-group">
    {!! Form::label('alias', 'Псевдоним:') !!}
    {!! Form::text('alias', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('code', 'Код товара:') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('car_list', 'Автомобиль:') !!}
    {!! Form::select('car_list[]', $cars, !empty($item) ? $itim->car_list : null, ['id' => 'car_list', 'class' => 'form-control', 'placeholder' => 'Выберите автомобиль', 'multiple']) !!}
</div>

<div class="form-group">
    {!! Form::label('image', 'Фото:') !!}
	{!! Form::file('image', ['class' => 'form-control'])!!}
</div>

<div class="form-group">
    {!! Form::label('price', 'Цена:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('amount', 'Количество на складе:') !!}
    {!! Form::text('amount', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Описание:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>