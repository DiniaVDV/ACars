<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MyAuth extends Controller
{
    public function auth(Request $request) {
        if (\Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'),'status'=>'1']))
        {
            return redirect('/');
        }
        else {
            return back()->with('message','Не правильный логин или пароль, а может не подтвержден email');
        }

    }
}
