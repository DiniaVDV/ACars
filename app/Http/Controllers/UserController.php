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
		$userId = Auth::user()->id;
		$aboutUser = AboutUser::findOrFail($userId);
		return view('user.ownInfo', compact('aboutUser'));
	}
	/*
	*
	* Get list of orders for user
	*
	*/
	
	public function store(AboutUserRequest $request)
	{
		dd($request);
	}
	
	
	public function orderHistory()
	{
		
	}
}
