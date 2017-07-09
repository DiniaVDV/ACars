<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Car;
use App\Models\Order;
use App\Models\Brand;
use App\Models\DeliveryAddress;
use App\Models\OrderDetail;
use Session;

class ItemsController extends Controller
{
			
	public function getItems($alias, Request $request)
	{
        $request->session()->put('car_alias', $alias);
		$car = Car::getCar($alias);
		$request->session()->put('car_id', $car['id']);
        $brands = array();
		$items = Car::findItems($car['id']);
		$request->session()->put('listOfItems', $items);
		foreach($items as $item){
			if(empty($item->image)){
                $item->image = 'no_picture.gif';
            }
			$brands[$item['id']] = Item::find($item['id'])->brand()->first();
		}
        $listOfBrands = array_unique($brands);
        return view('pages.listOfItems', compact('brands', 'items', 'car', 'listOfBrands'));
	}	


	
	public function selectItemCar($car, $item_alias_code, Request $request)		
	{
		
		$item = Item::getItemsByAliasCode($item_alias_code);
		$brand = Item::find($item->id)->brand()->first();
		$cars = Item::find($item->id)->cars()->get();
		return view('shop.aboutItem', compact('item', 'brand', 'cars'));
		
	}
	
	public function selectItem($item_alias_code, Request $request)		
	{
		$item = Item::getItemsByAliasCode($item_alias_code);
		$brand = Item::find($item->id)->brand()->first();
		$cars = Item::find($item->id)->cars()->get();
		return view('shop.aboutItem', compact('item', 'brand', 'cars'));
		
	}

    public function addToCart( $id)
    {
        $item = Item::findOrFail($id);
		$brand = Item::findOrFail($id)->brand()->get();
        Cart::add($item, 1, ['brand'  => $brand, 'itemCode' => $item->code]);
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
	
	public function postCheckout(Request $request)
    {	
		$cart = Cart::content();		
		if(!empty(Cart::count())){		
			$data = $request->all();
			$order = new Order();
			$order->user_id = \Auth::user()->id;			
			$order->type_of_delivery_id = $data['typeOfDelivery'];
			$order->type_of_payment_id = $data['typeOfPayment'];
			$order->comment = $data['comment'];
			$order->total_price = ceil(Cart::total());
			$order->save();			
			foreach($cart as $cartItem){
				$orderDetail = new OrderDetail();
				$orderDetail->order_id = $order->id;
				$orderDetail->item_id = $cartItem->id;
				$orderDetail->price = $cartItem->price;
				$orderDetail->qty = $cartItem->qty;
				$orderDetail->save();	
			}
			if(empty($data['checkOldAddress'])){
				$newAddress = new DeliveryAddress();
				$newAddress->order_id = $order->id;
				$newAddress->city = $data['city'];
				$newAddress->street = $data['street'];
				$newAddress->house_number = $data['house_number'];
				$newAddress->flat_number = $data['flat_number'];
				$newAddress->save();							
			}
			$this->cleanCart();
			return view('shop.orderPlaced', compact('order'));
		}
		return redirect('/');
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
