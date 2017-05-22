<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarItem;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
	
    public function index($car_id = 1)
    {	
		$items = Car::find($car_id)->items()->get();
		foreach($items as $item){

			// echo ($item['title']) . " - ";
			$brands[$item['id']] = Item::find($item['id'])->brand()->get();
			// echo($brands[$item['id']][0]["name"]);
		}

        return view('pages.listOfItems', compact('brands', 'items')); 
    }
	
	

    public function about()
    {
        return view('pages.about');
    }

    public function paymentAndDelivery()
    {
        return view('pages.paymentAndDelivery');
    }

    public function contacts()
    {
		
        return view('pages.contacts');
    }

}
