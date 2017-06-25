<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
	protected $fillable = [
		'name',
		'logo',
		'description',
		'country',
	];
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
