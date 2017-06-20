
<div class="form-group">
    {!! Form::label('alias', 'Псевдоним:') !!}
    {!! Form::text('alias', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('brand', 'Марка:') !!}
    {!! Form::text('brand', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('years', 'Года выпуска:') !!}
    {!! Form::select('years', array('0' => 'Нет', '1' => 'Да'),  null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('model', 'Модель:') !!}
    {!! Form::text('model', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('engine', 'Объем двигателя:') !!}
    {!! Form::text('engine', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('modification', 'Модификация:') !!}
    {!! Form::text('modification', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('image', 'Фото:') !!}
	{!! Form::file('img',['class' => 'form-control'])!!}
</div>

<div class="form-group">
    {!! Form::label('type_of_car', 'Тип автомобиля:') !!}
	{!! Form::select('type_of_car', $typeOfCars, !empty($car) ? $car->type_of_car : null, ['class' => 'form-control type_of_car', 'placeholder' => 'Выберите тип автомобиля']) !!}
</div>

<div class="form-group">
    {!! Form::label('type_of_body', 'Тип кузова:') !!}
	{!! Form::select('type_of_body', $typeOfBody, !empty($car) ? $car->type_of_body : null, ['class' => 'form-control type_of_body', 'placeholder' => 'Выберите тип кузова']) !!}
</div>

<div class="form-group">
    {!! Form::label('type_of_engine', 'Тип двигателя:') !!}
    {!! Form::text('type_of_engine', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('wheel_drive', 'Тип приводa:') !!}
	{!! Form::select('wheel_drive', $wheelDrive, !empty($car) ? $car->wheel_drive : null, ['class' => 'form-control type_of_body', 'placeholder' => 'Выберите тип приводa']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>