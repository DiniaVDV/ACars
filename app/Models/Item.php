<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

	public function getItems()
	{
		
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
