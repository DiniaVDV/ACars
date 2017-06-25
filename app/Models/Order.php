<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
		'user_id',
		'type_of_delivery_id',
		'type_of_payment_id',
		'status',
		'comments',		
	];
	
}
