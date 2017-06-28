<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Brand;
use App\Models\Car;
use App\Http\Requests\ItemsRequest;

class ItemsController extends Controller
{

    public function index()
    {
		$cars = Car::pluck('alias', 'id');
        $items = Item::orderBy('name')->paginate(10);
		$brands = Brand::pluck('name', 'id');
        return view('admin.items.show', compact('items', 'brands', 'cars'));
    }

    public function create()
    {
        return view('admin.items.create');
    }

    public function store(ItemsRequest $request)
    {
		$item = $request->all();
		if(empty($item['image'])){
			$item['image'] = 'no_picture.gif';
		}
        Item::create($item);
        return redirect('admin/items')->with([
            'flash_message' => 'Товар добавлен!',
            'flash_message_important' => true
        ]);
    }

    public function edit($id)
    {
		$cars = Car::pluck('alias', 'id');
        $item = Item::findOrFail($id);
        return view('admin.items.edit', compact('item', 'cars'));
    }

    public function update($id, ItemsRequest $request)
    {
        $item = Item::findOrFail($id);
        $item->update($request->all());
        return redirect('admin/items')->with([
            'flash_message' => 'Товар обновлен!',
            'flash_message_important' => true
        ]);
    }

    public function destroy($id)
    {
        Item::findOrFail($id)->delete();
        return redirect()->route('admin/items')->with([
            'flash_message' => 'Товар удален!',
            'flash_message_important' => true
        ]);
    }

}
