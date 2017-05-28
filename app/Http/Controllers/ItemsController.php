<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;;
use Illuminate\Http\Request;
use App\Models\Item;
use Session;

class ItemsController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $item = Item::find($id);

       // $old_cart = Session::has('cart') ? Session::get('cart') : null;

        $cart = Cart::add($item, 1);
        $cont = Cart::content();
        var_dump($cont);
        return Cart::count();
    }

    public function getCart()
    {

        $cart = Cart::content();
        if(Cart::count() == null){
            return view('shop.shoppingCart');
        }
        return view('shop.shoppingCart', compact('cart'));
    }

    public function getCheckout()
    {
        $cart = Cart::content();
        if(Cart::count() == null){
            return view('shop.shoppingCart');
        }
        return view('shop.checkout', compact('cart'));

    }
}
