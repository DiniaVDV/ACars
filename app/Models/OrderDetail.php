<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
		'order_id',
		'item_id',	
		'price',		
		'qty',		
	];
	
	public $timestamps = false;
}
