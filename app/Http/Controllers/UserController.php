<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUser;
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
		
	}
}
