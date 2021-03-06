<?php

namespace App\Http\Controllers\Admin;

use Gloudemans\Shoppingcart\Facades\Cart;;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Item;
use App\Models\Brand;
use App\Models\OrderDetail;
use App\Models\OrderStatus;
use App\Models\User;
use App\Models\TypeOfDelivery;
use App\Models\TypeOfPayment;
use Session;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::where('status_id', 3)->paginate(10);
		$users = User::pluck('name' , 'id');
		$typeOfDelivery = TypeOfDelivery::pluck('title' , 'id');
		$typeOfPayment = TypeOfPayment::pluck('title' , 'id');
        return view('admin.orders.show', compact('orders', 'users', 'typeOfDelivery', 'typeOfPayment'));
    }
	
	public function waiting()
	{
		$orders = Order::where('status_id', 1)->orWhere('status_id', 2)->paginate(10);
		$users = User::pluck('name' , 'id');
		$typeOfDelivery = TypeOfDelivery::pluck('title' , 'id');
		$typeOfPayment = TypeOfPayment::pluck('title' , 'id');
		$orderStatus = OrderStatus::pluck('title' , 'id');
        return view('admin.orders.showWaitingOrders', compact('orders', 'users', 'typeOfDelivery', 'typeOfPayment', 'orderStatus'));
	}
	
	public function editDetails($order_id, $idItem)
	{

		dd($idItem);
		return view('admin.order.detailItem');
	}
    public function edit($id)
    {
        $order = Order::findOrFail($id);

        return view('admin.orders.edit', compact('order', 'orders'));
    }

    public function update($id, OrderRequest $request)
    {
        $Order = Order::findOrFail($id);
        $Order->update($request->all());
        return redirect()->route('admin.orders')->with([
            'flash_message' => 'Заказ обновлен!',
            'flash_message_important' => true
        ]);
    }

    public function deleteItem($order_id, $idItem)
    {
        $orderDet = OrderDetail::where([
                        ['order_id', $order_id],
                        ['item_id', $idItem],
                    ])->first();
        $order = Order::findOrFail($order_id);
        $order->total_price -= $orderDet->qty * $orderDet->price;
        $order->save();
        $orderDet->delete();
        return redirect("admin/orders/$order_id/details/change")->with([
            'flash_message' => 'Товар удален!',
            'flash_message_important' => true
        ]);

    }
    public function destroy($id)
    {
        Order::findOrFail($id)->delete();
        return redirect()->route('admin.orders')->with([
            'flash_message' => 'Категория удалена!',
            'flash_message_important' => true
        ]);
    }
	
	public function changeDetails($id)
	{
		$orderDetails = OrderDetail::where('order_id', $id)->get();
		$order = Order::findOrFail($id);
		$orderSum = $order->total_price;

		$nameItems = $this->getListOfItem($orderDetails);

		$createdAt = Order::findOrFail($id)->value('created_at');		
		return view('admin.orders.changeDetails', compact('orderDetails', 'createdAt', 'nameItems', 'orderSum'));
	}

	public function getListOfItem($items)
    {
        $nameItems = array();
        foreach($items as $itemIn){
            $item = Item::findOrFail(!empty($itemIn->item_id) ? $itemIn->item_id : $itemIn->id);
            $brand = Brand::findOrFail($item->brand_id);
            $nameItems[$item->id] = $item->name . ' ' . $item->code . ' ' . $brand->name;
        }
        return $nameItems;
    }

    public function getAddItemToOrder($orderId)
    {

        $items = Item::all();
        $nameItems = $this->getListOfItem($items);

        return view('admin.orders.addItemToOrder', compact('nameItems', 'orderId'));
    }

    public function postAddItemToOrder($orderId, Request $request)
    {

        $itemAdd['item_id'] = $request->input('item');
        $itemAdd['order_id'] = $orderId;
        $itemAdd['qty'] = $request->input('qty');
        $itemAdd['price'] = Item::findOrFail($itemAdd['item_id'])->value('price');
        OrderDetail::create($itemAdd);

        $order = Order::findOrFail($orderId);
        $order->total_price += $itemAdd['qty'] * $itemAdd['price'];
        $order->save();
        return redirect("admin/orders/$orderId/details/change")->with([
            'flash_message' => 'Товар добавлен!',
            'flash_message_important' => true
        ]);
    }
	public function details($id)
	{
	    $allData = $this->getDetails($id);
        $orderDetails = $allData[0];
        $createdAt = $allData[1];
        $nameItems = $allData[2];

		return view('admin.orders.details', compact('orderDetails', 'createdAt', 'nameItems'));
	}

	public static function getDetails($id)
    {
        $dataArray = array();
        $orderDetails = OrderDetail::where('order_id', $id)->get();
        $dataArray[0] = $orderDetails;
        $createdAt = Order::findOrFail($id);
        $dataArray[1] = $createdAt->created_at;
        $nameItems = array();
        foreach($orderDetails as $itemDetail){
            $item = Item::findOrFail($itemDetail->item_id);
            $brand = Brand::findOrFail($item->brand_id);
            $nameItems[$itemDetail->id] = $item->name . ' ' . $item->code . ' ' . $brand->name;
        }

        $dataArray[2] = $nameItems;
        return $dataArray;
    }
	
	public function changeTypeOfDelivery(Request $request)
	{
		$order = Order::findOrFail($request->get('order_id'));
		$order->type_of_delivery_id = $request->get('type_of_delivery_id');
		$order->update();
	}	
	
	public function changeTypeOfPayment(Request $request)
	{
		$order = Order::findOrFail($request->get('order_id'));
		$order->type_of_payment_id = $request->get('type_of_payment_id');
		$order->update();
	}
	
	public function changeStatus(Request $request)
	{
		$status_id = $request->get('status_id');
		$order = Order::findOrFail($request->get('order_id'));
		$order->status_id = $status_id;
		$order->update();		
		if($status_id !=3 ){
			return 0;
		}else{
			return 1;
		}
	}
	
	public function changeQtyItem($order_id, $item_id, Request $request)
	{
		$order = Order::findOrFail($order_id);
		$order->total_price = $request->get('total_price');
		$order->update();
		$item = OrderDetail::where([
			['order_id', $order_id],
			['item_id', $item_id],
			])->first();
		$item->qty = $request->get('qty');
		$item->update();
		
	}
}
