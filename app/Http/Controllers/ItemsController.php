<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Car;
use App\Models\Order;
use App\Models\DeliveryAddress;
use App\Models\OrderDetail;
use App\Http\Requests\CheckoutRequest;
use Session;
use Mail;
use App\Mail\OrderShipped;

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
			$brands[$item['id']] = Item::find($item['id'])->brand()->get();
		}
        return view('pages.listOfItems', compact('brands', 'items', 'car'));
	}	


	
	public function selectItemCar($carAlias, $item_alias_code, Request $request)
	{

        $item = Item::getItemsByAliasCode($item_alias_code);

        $item->description = explode('|', $item->description);
        $brand = Item::find($item->id)->brand()->first();
        $cars = Item::find($item->id)->cars()->get();
        $items = Car::where('alias', $carAlias)->firstOrFail()->items()->get();
        $categoryIn = Item::find($item->id)->categories()->get();
        $listOfItems = array();
        if(!empty($items)){
            foreach ($items as $itemFromList){
                if($itemFromList->id != $item->id){
                    $categoryFromList = $itemFromList->categories()->get();
                    foreach ($categoryFromList as $category){
                        $flag = $this->checkCategoryId($categoryIn, $category);
                        if($flag){
                            $brandForListOfItem = Item::findOrFail($itemFromList->id)->brand()->get();

                            $listOfItems[$brandForListOfItem[0]->name] = $itemFromList;
                            break;
                        }
                    }
                }

            }
        }
        return view('shop.aboutItem', compact('item', 'brand', 'cars', 'listOfItems'));
	}

	public function checkCategoryId($categoryIn, $categoryTry){
            foreach ($categoryIn as $categoryInOne) {
                if($categoryInOne->id == $categoryTry->id){
                    return true;
                }else{
                    return false;
                }
	        }
    }

	public function selectItem($item_alias_code, Request $request)		
	{

		$item = Item::getItemsByAliasCode($item_alias_code);
        $comments = $item->comments()->orderBy('created_at', "desc")->paginate(5);
        $users = User::usersForComments($comments);
        $item->description = explode('|', $item->description);
		$brand = Item::find($item->id)->brand()->first();
		$cars = Item::find($item->id)->cars()->get();

		return view('shop.aboutItem', compact('item', 'brand', 'cars', 'comments', 'users'));
		
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

        if(Cart::count() == null){
            return view('shop.shoppingCart');
        }
        $aboutUser = \Auth::user()->aboutUser()->get();

        $userAddress = !empty($aboutUser[0]->city)? $aboutUser[0]->city . ', ' : '';
        $userAddress .= !empty($aboutUser[0]->street)? $aboutUser[0]->street . ' ' : '';
        $userAddress .= !empty($aboutUser[0]->house_number)? $aboutUser[0]->house_number . ', кв.' : '';
        $userAddress .= !empty($aboutUser[0]->flat_number)? $aboutUser[0]->flat_number : '';

        return view('shop.checkout', compact('cart', 'userAddress'));
    }
	
	public function postCheckout(CheckoutRequest $request)
    {
        $user = \Auth::user();
        $dataToMail = array();
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
            Mail::to($user->email)->send(new OrderShipped($user, $order));
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
