<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
   	 /**
     * The items that belongs to the brand.
     *
     * @return 
     */

    public function items()
    {
        return $this->belongsToMany('App\Models\Item');
    }
}
