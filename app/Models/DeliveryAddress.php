<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class DeliveryAddress extends Model
{
	protected $fillable =[
		'user_id',
		'order_id',
		'city',
		'street',
		'house_number',
		'flat_number',
	];
	
	public $timestamps = false;
}
