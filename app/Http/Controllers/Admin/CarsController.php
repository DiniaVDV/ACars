<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\TypeOfBody;
use App\Models\TypeOfCar;
use App\Models\TypeOfEngine;
use App\Models\WheelDrive;
use App\Models\Year;
use App\Http\Requests\CarRequest;

class carsController extends Controller
{

    public function index()
    {
		$typeOfBody = TypeOfBody::pluck('name', 'id');
		$typeOfCar = TypeOfCar::pluck('name', 'id');
		$typeOfEngine = TypeOfEngine::pluck('name', 'id');
		$wheelDrive = WheelDrive::pluck('name', 'id');
		$years = Year::pluck('year', 'id');
        $cars = Car::paginate(10);
        return view('admin.cars.show', compact('cars', 'typeOfBody', 'typeOfCar', 'typeOfEngine', 'wheelDrive', 'years'));
    }

    public function create()
    {
		$typeOfBody = TypeOfBody::pluck('name', 'id');
		$typeOfCars = TypeOfCar::pluck('name', 'id');
		$typeOfEngine = TypeOfEngine::pluck('name', 'id');
		$wheelDrive = WheelDrive::pluck('name', 'id');
		$years = Year::pluck('year', 'id');		
        return view('admin.cars.create', compact('car', 'typeOfBody', 'typeOfEngine', 'typeOfCars', 'wheelDrive', 'years'));
    }

    public function store(CarRequest $request)
    {
		$car = $request->all();
		$year_began = Year::findOrFail($car['year_began_id']);
		$year_ended = Year::findOrFail($car['year_ended_id']);
		$car['years'] = $year_began->year . '-' . $year_ended->year;
		$car['alias'] = empty($car['alias']) ? $this->aliasForCar($car) : $car['alias'];
		Car::create($car);
		
        return redirect('admin/cars')->with([
            'flash_message' => 'Автомобиль добавлен!',
            'flash_message_important' => true
        ]);
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id);
		$typeOfBody = TypeOfBody::pluck('name', 'id');
		$typeOfCars = TypeOfCar::pluck('name', 'id');
		$typeOfEngine = TypeOfEngine::pluck('name', 'id');
		$wheelDrive = WheelDrive::pluck('name', 'id');
		$years = Year::pluck('year', 'id');

        return view('admin.cars.edit', compact('car', 'typeOfBody', 'typeOfEngine', 'typeOfCars', 'wheelDrive', 'years'));
    }

    public function update($id, CarRequest $request)
    {
        $car = Car::findOrFail($id);

        $car->update($request->all());
        return redirect('admin/cars')->with([
            'flash_message' => 'Данные об авто обновлены!',
            'flash_message_important' => true
        ]);
    }

    public function destroy($id)
    {
        Car::findOrFail($id)->delete();
        return redirect()->route('admin/cars')->with([
            'flash_message' => 'Автомобиль удален!',
            'flash_message_important' => true
        ]);
    }
	
	public function aliasForCar($car)
	{
		$carModel = str_replace(' ', '_',  $car['model']);
		$carEngine = str_replace(' ', '_',  $car['engine']);
		$car['alias'] = $car['brand'] . '_' . $carModel . '_' . $carEngine;
		return $car['alias'];		
	}
}
