<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Contracts\Buyable;

class Item extends Model implements Buyable
{

    public function getBuyableIdentifier($options = null){
        return $this->id;
    }

    public function getBuyableDescription($options = null){
        return $this->name;
    }

    public function getBuyablePrice($options = null){
        return $this->price;
    }

	public function getItems()
	{
		
	}
	
	public static function getRandomItems()
    {
        $items = self::inRandomOrder()->limit(18)->get();
        $brands = array();
        foreach ($items as $item){
            $brands[$item->id] = self::findOrFail($item->id)->brand()->get();
            if(empty($item->img)){
                $item->img = 'no_picture.gif';
            }
        }

        return array('items' => $items, 'brands' => $brands);
    }
	
   	 /**
     * The brands that belongs to the item.
     *
     * @return 
     */

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }
	
	 /**
     * The cars that belongs to the item.
     *
     * @return 
     */

    // public function brands()
    // {
        // return $this->belongsToMany('App\Models\Brand', 'brand_item', 'brand_id', 'item_id');
    // }

	
	

}
