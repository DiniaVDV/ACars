<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\TypeOfBody;
use App\Models\TypeOfCar;
use App\Models\TypeOfEngine;
use App\Models\WheelDrive;
// use App\Http\Requests\CarsRequest;

class carsController extends Controller
{

    public function index()
    {
		$typeOfBody = TypeOfBody::pluck('name', 'id');
		$typeOfCar = TypeOfCar::pluck('name', 'id');
		$typeOfEngine = TypeOfEngine::pluck('name', 'id');
		$wheelDrive = WheelDrive::pluck('name', 'id');
        $cars = Car::paginate(10);
        return view('admin.cars.show', compact('cars', 'typeOfBody', 'typeOfCar', 'typeOfEngine', 'wheelDrive'));
    }

    public function create()
    {
        return view('admin.cars.create');
    }

    public function store(/*carsRequest $request*/)
    {
        Car::create($request->all());
        return redirect('admin/cars')->with([
            'flash_message' => 'Реклама добавлена!',
            'flash_message_important' => true
        ]);
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('admin.cars.edit', compact('Car'));
    }

    public function update($id/*, CarsRequest $request*/)
    {
        $car = Car::findOrFail($id);
        $car->update($request->all());
        return redirect('admin/cars')->with([
            'flash_message' => 'Реклама обновлена!',
            'flash_message_important' => true
        ]);
    }

    public function destroy($id)
    {
        Car::findOrFail($id)->delete();
        return redirect()->route('admin/cars')->with([
            'flash_message' => 'Реклама удалена!',
            'flash_message_important' => true
        ]);
    }

}
