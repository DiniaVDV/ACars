<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Item;

class CarsController extends Controller
{

    public function getYears(Request $request)
    {
		$brand = $request->input();
		$request->session()->put('brand', $brand);
        $years = Car::getListOfYears($brand);
        return $years;

    }
	
    public function getModels(Request $request)
    {
		$brand = $request->session()->get('brand');
		$year = $request->input();
		$request->session()->put('year', $year);
        $years = Car::getListOfModels($year, $brand);

        return $years;

    }
	
	public function getEngines(Request $request)
	{
		
		$model = $request->input();
		
		$result = Car::getListOfEngines($model);
		return $result;
		
	}
	
	public function getItems($alias, Request $request)
	{
		$car = Car::getCar($alias);
		$request->session()->put('car_id', $car['id']);
		$items = Car::findItems($car['id']);
		foreach($items as $item){
			$brands[$item['id']] = Item::find($item['id'])->brand()->get();
		}
		
        return view('pages.listOfItems', compact('brands', 'items', 'car'));		
		
	}	
	
}
