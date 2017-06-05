<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use App\Models\CarItem;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
	
    public function index()
    {
        $itemsBrans = Item::getRandomItems();
        return view('pages.main', compact('items', 'itemsBrans'));
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

    public function listOfItems(Request $request)
    {
		$alias = $request->input()['alias'];	
		
		$items = Car::find($car_id)->items()->get();
		foreach($items as $item){
			$brands[$item['id']] = Item::find($item['id'])->brand()->get();
		}
        return view('pages.listOfItems', compact('brands', 'items'));
    }

}
