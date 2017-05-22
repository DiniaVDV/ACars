<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{

   	 /**
     * The items that belongs to the car.
     *
     * @return 
     */

    // public function items()
    // {
        // return $this->belongsToMany('App\Models\Item');
    // }
	
		 /**
     * The cars that belongs to the item.
     *
     * @return 
     */

    public function items()
    {
        return $this->belongsToMany('App\Models\Item', 'car_item', 'car_id', 'item_id');
    }

}
