<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Dropdown;
use App\Http\Requests\DropdownRequest;

class DropdownController extends Controller
{
    public function index()
    {
        $dropdowns = Dropdown::all();
        return view('admin.dropdown.show', compact('dropdowns'));
    }

    public function create()
    {
        return view('admin.dropdown.create');
    }

    public function store(DropdownRequest $request)
    {
        Dropdown::create($request->all());
        return redirect('admin_panel/dropdown')->with([
            'flash_message' => 'Пункт меню добавлен!',
            'flash_message_important' => true
        ]);
    }

    public function edit($id)
    {
        $dropdown = Dropdown::all();
        return view('admin.dropdown.edit', compact('dropdown'));
    }

    public function update($id, DropdownRequest $request)
    {
        $dropdown = Dropdown::findOrFail($id);
        $dropdown->update($request->all());
        return redirect()->route('admin_panel.dropdown')->with([
            'flash_message' => 'Пункт меню обновлена!',
            'flash_message_important' => true
        ]);
    }
    public function destroy($id)
    {
        Dropdown::findOrFail($id)->delete();
        return redirect()->route('admin_panel.dropdown')->with([
            'flash_message' => 'Пункт меню удален!',
            'flash_message_important' => true
        ]);
    }

}
