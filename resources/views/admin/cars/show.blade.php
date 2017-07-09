@extends('admin.app')
@section('content')
    <h1 class="page-header">Автомобили</h1>
    @include('admin.partials.flash')

    <div class=bs-example data-example-id=striped-table>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Псевдоним</th>
                <th class="tableCenter">Марка</th>
                <th class="tableCenter">Года выпуска</th>
                <th class="tableCenter">Модель</th> 
				<th class="tableCenter">Объем двигателя</th>
                <th class="tableCenter">Тип автомобиля</th>
                <th class="tableCenter">Тип кузова</th>
                <th class="tableCenter">Тип двигателя</th> 
				<th class="tableCenter">Тип приводa</th>
                <th class="tableCenter">Действия</th>
            </tr>
            </thead>
    @foreach($cars as $car)
            <tbody>
                <tr>
                    <td>
						<div>
							<strong>{{$car->id}}</strong></td>
						</div>
                    <td><strong>{{$car->alias}}</strong></td>
                    <td align="center"><strong>{{$car->brand}}</strong></td>
                    <td align="center"><strong>{{!empty($car->year_began_id) ? $years[$car->year_began_id] : ''}} - {{!empty($car->year_ended_id) ? $years[$car->year_ended_id] : ''}} </strong></td>
                    <td align="center"><strong>{{$car->model}}</strong></td>
                    <td align="center"><strong>{{$car->engine}}</strong></td>
                    <td align="center"><strong>{{!empty($car->type_of_car_id) ? $typeOfCar[$car->type_of_car_id] : 'нет данных'}}</strong></td>
                    <td align="center"><strong>{{!empty($car->type_of_body_id) ? $typeOfBody[$car->type_of_body_id] : 'нет данных'}}</strong></td>
                    <td align="center"><strong>
					{{!empty($car->type_of_engine_id) ? $typeOfEngine[$car->type_of_engine_id] : 'нет данных'}}</strong></td>
                    <td align="center"><strong>{{!empty($car->wheel_drive_id) ? $wheelDrive[$car->wheel_drive_id] : 'нет данных'}}</strong></td>
                    <td align="center" class="actionCol">
						<ul class="nav navbar-top-links">
                            <li class="actioned">
								<a href="{{asset('admin/cars')}}/{{$car->id}}/edit" title="редактировать"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
							</li>

                            <li class="actioned">
								<a href="{{asset('admin/cars')}}/{{$car->id}}/delete" onclick="return confirmDelete('автомобиль')" title="удалить"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
							</li>
						</ul>
                    </td>
                </tr>
            </tbody>
    @endforeach
        </table>
    </div>
@endsection