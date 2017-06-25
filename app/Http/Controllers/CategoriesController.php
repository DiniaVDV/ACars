<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Car;
use App\Models\Item;

class CategoriesController extends Controller
{
	
	//Created array of categoties in right form (for show in browser).
	
    public static function  listOfCategories()
    {
		$categories = Category::all();
		foreach($categories as $element){
			if($element['has_child'] &&  $element['parent_id'] == null){
				$listCategories[$element['title']] = CategoriesController::hasChild($element, $categories);
			}
		}
		return $listCategories;
    }
	
	//helping function for listOfCategories().

	private static function hasChild($element, $categories)
	{
		$listOfChild = array(0 => $element);
		$i = 0;
		foreach($categories as $childElement){
			$i++;
			if($element['id'] == $childElement['parent_id'] || $element['id'] == $childElement['parent_id_2']){
				if($childElement['has_child']){
					$listOfChild[$childElement['title']] = CategoriesController::hasChild($childElement, $categories);
				}else{
				$listOfChild[$childElement['title']] = $childElement;
				}
			}
		}
		return $listOfChild;
	}

	public function categories($category, Request $request)		
	{
		//return $request->session()->get('car_id');
		return view('shop.aboutItem');
		
	}

	public function select($alias, $catName, Request $request)
    {
        $brands = array();
        $items = array();
        $listOfItems = Category::where('category_name', $catName)->first()->items()->get();
        $carId = $request->session()->get('car_id');

        foreach ($listOfItems as $item){
            $cars = $item->cars()->get();
            if(!empty($cars)){
                foreach($cars as $car){
                    if($car->id == $carId){
                        $items[$item->id] = $item;
                        $brands[$item->id] = Item::find($item['id'])->brand()->get();
                        break;
                    }
                }
            }
        }
        $request->session()->put('car_alias', $alias);
        $car = Car::getCar($alias);
        return view('pages.listOfItems', compact('brands', 'items', 'car'));
    }
}
