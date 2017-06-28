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

	public static function getItemsByAliasCode($item_alias_code)
	{
		$alias_code = explode('_', $item_alias_code);
		$item = self::where([
				['alias', $alias_code[0]],
				['code', $alias_code[1]],
		])->firstOrFail();
		return $item;
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
     * The brand that belongs to the item.
     *
     * @return 
     */

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

   /**
     * Get the cars associated with the given item
	 *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
	 
	public function cars()
	{
		return $this->belongsToMany('App\Models\Car');
	}
	 
	 /**
     * Get a car id s associated with current item
     *
     * @return array
     */
	 
	public function getCarListAttribute()
	{
		return $this->cars->pluck('id')->toArray();
	}

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
	
}
