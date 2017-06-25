
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
    {!! Form::select('year_began_id', $years,  !empty($car->year_began_id) ? $car->year_began_id : null, ['class' => 'form-control', 'placeholder' => 'Выберите начало выпуска']) !!}
	{!! Form::select('year_ended_id', $years, !empty($car->year_ended_id) ? $car->year_ended_id : null, ['class' => 'form-control', 'placeholder' => 'Выберите конец выпуска' ]) !!}
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
    {!! Form::label('type_of_car_id', 'Тип автомобиля:') !!}
	{!! Form::select('type_of_car_id', $typeOfCars, !empty($car) ? $car->type_of_car_id : null, ['class' => 'form-control type_of_car', 'placeholder' => 'Выберите тип автомобиля']) !!}
</div>

<div class="form-group">
    {!! Form::label('type_of_body_id', 'Тип кузова:') !!}
	{!! Form::select('type_of_body_id', $typeOfBody, !empty($car) ? $car->type_of_body_id : null, ['class' => 'form-control type_of_body', 'placeholder' => 'Выберите тип кузова']) !!}
</div>

<div class="form-group">
    {!! Form::label('type_of_engine_id', 'Тип двигателя:') !!}
	{!! Form::select('type_of_engine_id', $typeOfEngine, !empty($car) ? $car->type_of_engine_id : null, ['class' => 'form-control type_of_engine', 'placeholder' => 'Выберите тип приводa']) !!}
</div>

<div class="form-group">
    {!! Form::label('wheel_drive_id', 'Тип приводa:') !!}
	{!! Form::select('wheel_drive_id', $wheelDrive, !empty($car) ? $car->wheel_drive_id : null, ['class' => 'form-control wheel_drive', 'placeholder' => 'Выберите тип приводa']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>