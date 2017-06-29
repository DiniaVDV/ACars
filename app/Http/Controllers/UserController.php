<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\AboutUser;
use App\Models\User;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Requests\AboutUserRequest;

class UserController extends Controller
{
	
    public function getProfile()
    {
		$aboutUser = AboutUser::where('user_id', \Auth::user()->id)->first();
        return view('user.index', compact('aboutUser'));
    }
	/**
	* Change info about user
	*
	*
	*/
	public function editOwnInfo()
	{
		$userId = \Auth::user()->id;

		$aboutUser = AboutUser::where('user_id', $userId)->first();
				
		return view('user.ownInfo', compact('aboutUser'));
	}
	/*
	*
	* Get list of orders for user
	*
	*/
	
	public function store(AboutUserRequest $request)
	{
		$data = $request->all();
		$data['user_id'] = \Auth::user()->id;
		$aboutUser = AboutUser::where('user_id', $data['user_id'])->first();
		if($aboutUser){
			$aboutUser->update($data);
		}else{
			AboutUser::create($data);
		}
		
		return redirect()->route('user', \Auth::user()->name)->with([
            'flash_message' => 'Данные обновленны!',
            'flash_message_important' => true
        ]);
	}
	
	
	public function orderHistory()
	{
		$userId = \Auth::user()->id;
		$orders = User::findOrFail($userId)->orders()->get();
        $orderDetails = array();
        $createdAt = array();
        $nameItems = array();
        $sum = array();
		if(!empty($orders)){
		    foreach ($orders as $order){
                $dataArray = OrdersController::getDetails($order->id);
                $orderDetails[$order->id] = $dataArray[0];
                $createdAt[$order->id] = $dataArray[1];
                $nameItems[$order->id] = $dataArray[2];
                $sum[$order->id] = $order->total_price;
            }
        }
        return view('user.ordersHistory', compact('orderDetails', 'createdAt', 'nameItems', 'sum'));
	}

	public function myComments()
    {

        $userId = \Auth::user()->id;
        $comments = User::findOrFail($userId)->comments()->get();
        foreach ($comments as $comment){
            $item = $comment->item()->first();
            $brand = $item->brand()->first();
            $nameItems[$comment->id] = $item->name . ' ' . $item->code . ' ' . $brand->name;
        }
        return view('user.myComments', compact('comments','nameItems'));
    }
}
