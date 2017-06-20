<?php

namespace App\Http\Controllers\Admin;

use App\Models\Background;
use App\Models\User;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Auth\Access\Response;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        $roles = User::find(\Auth::user()->id)->roles()->get();
        $request->session()->put('roles', $roles);

        return view('admin.categories.show');
    }

    public function changeBackgroundBody(){
        return view('admin.background');
    }

    public function applyBackgroundBody(Request $request)
    {
        $backgroundList =  Background::get()->first();
        $backgroundListArray = Background::get()->first()->toArray();
        $input = $request->all();

        foreach ($input as $inputKey => $inputValue){
            foreach ($backgroundListArray as $key => $background){
                if($inputKey == $key) {
                    $backgroundListArray[$key] = $input[$inputKey];
                }
            }
        }
        $backgroundList->update($backgroundListArray);

        return redirect('admin_panel/color_background')->with([
            'flash_message' => 'Фон изменен!',
            'flash_message_important' => true
        ]);
    }

}
