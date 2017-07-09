<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Brand;
use App\Models\Car;
use App\Http\Requests\ItemRequest;

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
        $cars = Car::pluck('alias', 'id');
        $brands = Brand::pluck('name', 'id');
        return view('admin.items.create', compact('cars', 'brands'));
    }

    public function store(ItemRequest $request)
    {

		$itemL = $request->all();
		if(empty($itemL['image'])){
            $itemL['image'] = 'no_picture.gif';
		}

        $item = new Item($itemL);
        $item->brand_id = $itemL['brand_id'];
		$item->save();
        $this->syncCars($item, $request->input('car_list'));

        return redirect('admin/items')->with([
            'flash_message' => 'Товар добавлен!',
            'flash_message_important' => true
        ]);
    }

    private function syncCars(Item $item, array $cars)
    {
        $item->cars()->sync($cars);
    }

    public function edit($id)
    {
		$cars = Car::pluck('alias', 'id');
		$brands = Brand::pluck('name', 'id');
        $item = Item::findOrFail($id);

        return view('admin.items.edit', compact('item', 'cars', 'brands'));
    }

    public function update($id, ItemRequest $request)
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
        return redirect('admin/items')->with([
            'flash_message' => 'Товар удален!',
            'flash_message_important' => true
        ]);
    }

}
