<?php

namespace App\Http\Controllers\Admin;

use Gloudemans\Shoppingcart\Facades\Cart;;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Item;
use App\Models\Brand;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\TypeOfDelivery;
use App\Models\TypeOfPayment;
use Session;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(10);
		$users = User::pluck('name' , 'id');
		$typeOfDelivery = TypeOfDelivery::pluck('title' , 'id');
		$typeOfPayment = TypeOfPayment::pluck('title' , 'id');
        return view('admin.orders.show', compact('orders', 'users', 'typeOfDelivery', 'typeOfPayment'));
    }
	
	public function details($id)
	{
		
		$orderDetails = OrderDetail::where('order_id', $id)->get();
		foreach($orderDetails as $itemDetail){
			$item = Item::findOrFail($itemDetail->id);
			$brand = Brand::findOrFail($item->brand_id);
			$nameItems[$itemDetail->id] = $item->name . ' ' . $item->code . ' ' . $brand->name;
		}
		$createdAt = Order::findOrFail($id)->value('created_at');
		return view('admin.orders.details', compact('orderDetails', 'createdAt', 'nameItems'));
	}

	public function editDetails($order_id, $idItem)
	{
		dd($idItem);
		return view('admin.order.detailItem');
	}
    public function edit($id)
    {
        $Order = Order::findOrFail($id);
		$orders = Order::pluck( 'title', 'id');
		unset($orders[$Order->id]);
        return view('admin.orders.edit', compact('Order', 'orders'));
    }

    public function update($id, OrderRequest $request)
    {
        $Order = Order::findOrFail($id);
        $Order->update($request->all());
        return redirect()->route('admin.orders')->with([
            'flash_message' => 'Категория обновлена!',
            'flash_message_important' => true
        ]);
    }

    public function create()
    {
		$orders = Order::pluck( 'title', 'id');
        return view('admin.orders.create', compact('orders'));
    }

    public function store(OrderRequest $request)
    {
        Order::create($request->all());
        return redirect()->route('admin.orders')->with([
            'flash_message' => 'Категория была довавлена!',
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

}
