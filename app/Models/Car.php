<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
	public static function getCar($alias)
	{
		$car = self::where('alias', $alias)->first();
		$car['alias'] = strtoupper(str_replace('_', ' ', $car['alias']));
		return $car;
	}
	public static function findItems($car_id)
	{
		$items = self::find($car_id)->items()->get();
		return $items;
	}	
	
	
    public static function listOfCarBrands()
    {
        $listOfCarBrands = array();
        $cars = self::orderBy('brand')->get();
	
        foreach ($cars as $car){
            if (empty($listOfBrands)){
                $listOfCarBrands[] = $car['brand'];
            }
            $listOfCarBrands[] = $car['brand'];
        }
		$listOfCarBrands = array_values(array_unique($listOfCarBrands));
        return $listOfCarBrands;
    }

    public static function getListOfYears($brand)
    {   
        $years = array();
        $cars = self::orderBy('years')->get();
        foreach ($cars as $element){
            if($element['brand'] == $brand['brand']){
                $years[] = $element['years'];
            }
        }
		
        $listOfYears = self::explodeYears($years);
		
        return  $listOfYears;
    }


    public static function getListOfModels($year, $brand)
    {
        $models = array();	
        $cars = self::where('brand', $brand['brand'])->orderBy('model')->get();
        foreach ($cars as $element){
			if(!in_array($element['model'], $models)){				
				$periodOfYear = $element['years'];
				$years = self::explodeYears($periodOfYear);				
				if(min($years) <= $year['year'] && max($years) >= $year['year']){
					$models[] = $element['model'];			
				}
			}
        }
        return  $models;
    }

	public static function getListOfEngines($model)
	{
		$listOfId = array(); 
		$engines = array();	
		$cars = self::where('model', $model['model'])->orderBy('engine')->get();
		foreach($cars as $element){
			$engines[]= $element['engine'];
			$listOfId[] = $element['alias'];	
		}
		$result = array($engines, $listOfId);
        return  $result;
	}
	

    private static function explodeYears($years)
    {
		if(!is_array($years)){
			$year[] = $years;
			$years = $year;
		}
		
        $arrayOfPeriodYears = array();
        foreach ($years as $periodYears){
            $arrayOfYears[] = explode('-', $periodYears);
        }
		
        $younger = max(max($arrayOfYears));
        $older = min(min($arrayOfYears));
		
		$arrayOfYears = array();
		
        for($older; $older <= $younger; $older++){
            $arrayOfYears[] = (int)$older;
        };
        return $arrayOfYears;
    }


    /**
     * The items that belongs to the car.
     *
     * @return 
     */

    // public function items()
    // {
        // return $this->belongsToMany('App\Models\Item');
    // }
	
		 /**
     * The cars that belongs to the item.
     *
     * @return 
     */

    public function items()
    {
        return $this->belongsToMany('App\Models\Item', 'car_item', 'car_id', 'item_id');
    }
	
	public function getRouteKeyName()
	{
		return 'alias';
	}

	public function typeOfBody()
	{
		return $this->belongsTo('App\Models\TypeOfBody');
	}
	
	public function typeOfCar()
	{
		return $this->belongsTo('App\Models\TypeOfCar');
	}	
	
	public function typeOfEngine()
	{
		return $this->belongsTo('App\Models\TypeOfEngine');
	}
	
	public function wheelDrive()
	{
		return $this->belongsTo('App\Models\WheelDrive');
	}
}
