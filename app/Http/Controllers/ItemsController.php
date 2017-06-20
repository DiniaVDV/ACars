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
			if(empty($item->img)){
                $item->img = 'no_picture.gif';
            }
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
			if(empty($item->img)){
                $item->img = 'no_picture.gif';
            }
			$brands[$item['id']] = Item::find($item['id'])->brand()->get();
		}
        return view('pages.listOfItems', compact('brands', 'items', 'alias'));
    }
	
	public function selectItem($car, $item_name_code, Request $request)		
	{
		
		$item = $request->session()->all();
		return view('shop.aboutItem', compact('item'));
		
	}

    public function addToCart( $id)
    {
		
        $item = Item::findOrFail($id);
		$brand = Item::findOrFail($id)->brand()->get();
        $cart = Cart::add($item, 1, ['brand'  => $brand, 'itemCode' => $item->code]);
        $cont = Cart::content();
        // return  $cont;
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
	
	public function changeInstance(Request $request)
	{
		$data = $request->all();
		if($data['flag'] == 'true'){
			$this->addToCart($data['itemId']);
		}elseif($data['flag'] == 'false' && $data['deleteItem'] == 'false'){
			$cart = Cart::content();
			foreach($cart as $item){
				if($item->id == $data['itemId']){
					$qty = $item->qty - 1;
					Cart::update($item->rowId, $qty);
				}
			}
		}
		elseif($data['deleteItem'] == 'true'){
			$cart = Cart::content();
			foreach($cart as $item){
				if($item->id == $data['itemId'] && $data['flag'] == 'false'){
					Cart::remove($item->rowId);
				}
			}
		}
	}
	
	public function cleanCart()
	{
		Cart::destroy();
	}
	
	
}
