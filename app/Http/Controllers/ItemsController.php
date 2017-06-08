<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Car;
use Session;

class ItemsController extends Controller
{
			
	public function getItems($alias, Request $request)
	{
		$car = Car::getCar($alias);
		$request->session()->put('car_id', $car['id']);
		
		$items = Car::findItems($car['id']);
		$request->session()->put('listOfItems', $items);
		foreach($items as $item){
			$brands[$item['id']] = Item::find($item['id'])->brand()->get();
		}
		
        return view('pages.listOfItems', compact('brands', 'items', 'car'));		
		
	}	
	
	public function listOfItems(Request $request)
    {
		$alias = $request->input('alias');	
		$items = Car::find($car_id)->items()->get();
		$request->session()->put('listOfItems', $items);
		foreach($items as $item){
			$brands[$item['id']] = Item::find($item['id'])->brand()->get();
		}
        return view('pages.listOfItems', compact('brands', 'items', 'alias'));
    }
	
	public function selectItem($car, $item_name_code, Request $request)		
	{
		
		$item = $request->session()->all();
		return view('shop.aboutItem', compact('item'));
		
	}

    public function addToCart(Request $request, $id)
    {
        $item = Item::find($id);
		
        $cart = Cart::add($item, 1);
        $cont = Cart::content();
        return  $cont;
    }

    public function getCart()
    {

        $cart = Cart::content();
        if(Cart::count() == null){
            return view('shop.shoppingCart');
        }
        return view('shop.shoppingCart', compact('cart'));
    }

    public function getCheckout()
    {
        $cart = Cart::content();
        if(Cart::count() == null){
            return view('shop.shoppingCart');
        }
        return view('shop.checkout', compact('cart'));

    }
}
